package com.oneago.arusapp;

import androidx.appcompat.app.AppCompatActivity;

import android.content.Intent;
import android.os.Bundle;
import android.view.View;

public class ActivitySessions extends AppCompatActivity implements View.OnClickListener{

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_sessions);

    }

    @Override
    public void onClick(View v) {
switch (v.getId()){
    case R.id.button_survey:
        break;


    case R.id.button_management_services:
        Intent next = new Intent(this, ServiceManagement.class);
        startActivity(next);
        break;


}
    }
}
