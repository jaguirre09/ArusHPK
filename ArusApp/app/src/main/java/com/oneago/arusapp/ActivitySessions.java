package com.oneago.arusapp;

import androidx.appcompat.app.AppCompatActivity;

import android.content.Intent;
import android.os.Bundle;
import android.view.View;
import android.widget.Button;
import android.widget.ImageButton;
import android.widget.ImageView;

public class ActivitySessions extends AppCompatActivity implements View.OnClickListener {

    private ImageButton close;
    private Button next;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_sessions);

        close = findViewById(R.id.button_closed);
        next = findViewById(R.id.button_login);

        close.setOnClickListener(this);
        next.setOnClickListener(this);
    }

    @Override
    public void onClick(View v) {
        switch (v.getId()) {
            case R.id.button_closed:
                finish();
                break;

            case R.id.button_login:
                // TODO: validate pin
                startActivity(new Intent(this, MainActivity.class));
                break;
        }
    }
}
