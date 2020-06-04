package com.oneago.arusapp.activities;

import android.content.Intent;
import android.os.Bundle;
import android.view.View;
import android.widget.LinearLayout;
import android.widget.TextView;

import androidx.appcompat.app.AppCompatActivity;

import com.oneago.arusapp.R;
import com.oneago.arusapp.activities.settings.SettingsActivity;

import static com.oneago.arusapp.activities.ActivitySessions.user;

public class MainActivity extends AppCompatActivity implements View.OnClickListener {

    private LinearLayout managementServices, surveys, setting;
    private TextView userText;

    @Override
    protected void onCreate(Bundle savedInstanceState)  {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_main);

        managementServices = findViewById(R.id.button_management_services);
        surveys = findViewById(R.id.button_survey);
        setting = findViewById(R.id.button_setting);
        userText = findViewById(R.id.userText);

        managementServices.setOnClickListener(this);
        surveys.setOnClickListener(this);
        setting.setOnClickListener(this);

        userText.setText(String.format(getString(R.string.label_name), user.getName()));
    }

    @Override
    public void onClick(View v) {
        switch (v.getId()) {
            case R.id.button_management_services:
                Intent main_service = new Intent(this, ServiceManagement.class);
                startActivity(main_service);
                break;

            case R.id.button_survey:
                Intent main_inquiry = new Intent(this, ActivitySurvey.class);
                startActivity(main_inquiry);
                break;

            case R.id.button_setting:
                Intent main_settings = new Intent(this, SettingsActivity.class);
                startActivity(main_settings);
                break;
        }
    }
}
