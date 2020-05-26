package com.oneago.arusapp.activities;

import android.content.Intent;
import android.os.Bundle;
import android.view.View;
import android.widget.Button;

import androidx.appcompat.app.AppCompatActivity;

import com.oneago.arusapp.R;

public class ServiceManagement extends AppCompatActivity implements View.OnClickListener {

    private Button services;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_management);

        services = findViewById(R.id.button_services);
        services.setOnClickListener(this);
    }

    @Override
    public void onClick(View v) {
        switch (v.getId()) {
            case R.id.button_services:
                Intent main_exit = new Intent(this, MainActivity.class);
                startActivity(main_exit);
                break;
        }
    }
}
