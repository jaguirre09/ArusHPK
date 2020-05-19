package com.oneago.arusapp;

import androidx.appcompat.app.AppCompatActivity;

import android.content.Intent;
import android.os.Bundle;
import android.view.View;

public class service_Management extends AppCompatActivity {

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_management);
    }
    public void main_exit(View v) {

        Intent main_exit = new Intent(this, MainActivity.class);
        startActivity(main_exit);

    }
}
