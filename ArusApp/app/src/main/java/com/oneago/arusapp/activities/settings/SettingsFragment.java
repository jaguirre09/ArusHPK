package com.oneago.arusapp.activities.settings;

import android.os.Bundle;

import androidx.preference.PreferenceFragmentCompat;

import com.oneago.arusapp.R;

/**
 * Preference Fragment extends {@link PreferenceFragmentCompat} and linked to {@link R.xml#settings}
 *
 * @see PreferenceFragmentCompat
 */
public class SettingsFragment extends PreferenceFragmentCompat {
    @Override
    public void onCreatePreferences(Bundle savedInstanceState, String rootKey) {
        setPreferencesFromResource(R.xml.settings, rootKey);
    }
}
