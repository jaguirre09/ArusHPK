package com.oneago.arusapp;

import androidx.appcompat.app.AppCompatActivity;

import android.content.Intent;
import android.os.Bundle;
import android.view.View;
import android.widget.LinearLayout;
import android.widget.Toast;

public class MainActivity extends AppCompatActivity implements View.OnClickListener {

    private LinearLayout managementServices, surveys, setting;

    @Override
    protected void onCreate(Bundle savedInstanceState)  {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_main);

        managementServices = findViewById(R.id.button_management_services);
        surveys = findViewById(R.id.button_survey);
        setting = findViewById(R.id.button_setting);

        managementServices.setOnClickListener(this);
        surveys.setOnClickListener(this);
        setting.setOnClickListener(this);
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
                Toast.makeText(this, "Función en fase de desarrollo", Toast.LENGTH_LONG).show();
                break;
        }
    }
}
