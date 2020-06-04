package com.oneago.arusapp.activities.settings;

import android.os.Bundle;
import android.view.ViewGroup;
import android.widget.FrameLayout;

import androidx.appcompat.app.AppCompatActivity;

/**
 * This class show Preferences or Settings UI controlled by {@link SettingsFragment}
 * <p>This no linked to any XML Layout</p>
 *
 * @see SettingsFragment
 */
public class SettingsActivity extends AppCompatActivity {
    private static final int CONTENT_ID = 1010101010;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        FrameLayout frame = new FrameLayout(this);
        frame.setId(CONTENT_ID);
        setContentView(frame, new FrameLayout.LayoutParams(ViewGroup.LayoutParams.MATCH_PARENT, ViewGroup.LayoutParams.MATCH_PARENT));
        getSupportFragmentManager()
                .beginTransaction()
                .replace(CONTENT_ID, new SettingsFragment())
                .commit();
    }
}