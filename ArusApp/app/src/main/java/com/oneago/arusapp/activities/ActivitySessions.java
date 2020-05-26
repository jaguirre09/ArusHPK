package com.oneago.arusapp.activities;

import android.content.Intent;
import android.content.SharedPreferences;
import android.os.Bundle;
import android.util.Log;
import android.view.View;
import android.widget.Button;
import android.widget.EditText;
import android.widget.ImageButton;
import android.widget.TextView;

import androidx.appcompat.app.AppCompatActivity;
import androidx.preference.PreferenceManager;

import com.android.volley.Request;
import com.android.volley.RequestQueue;
import com.android.volley.Response;
import com.android.volley.VolleyError;
import com.android.volley.toolbox.StringRequest;
import com.android.volley.toolbox.Volley;
import com.oneago.arusapp.Constants;
import com.oneago.arusapp.R;
import com.oneago.arusapp.activities.settings.SettingsActivity;
import com.oneago.arusapp.objects.User;

import org.json.JSONException;
import org.json.JSONObject;

import java.util.HashMap;
import java.util.Map;

public class ActivitySessions extends AppCompatActivity implements View.OnClickListener {

    public static User user;
    private EditText pinInput;
    private TextView alert;
    private SharedPreferences preferences;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_sessions);

        ImageButton close = findViewById(R.id.button_closed);
        pinInput = findViewById(R.id.editText_login);
        Button next = findViewById(R.id.button_login);
        alert = findViewById(R.id.alertText);

        close.setOnClickListener(this);
        next.setOnClickListener(this);

        preferences = PreferenceManager.getDefaultSharedPreferences(this);

        if (preferences.getBoolean("first_time", true)) {
            SharedPreferences.Editor editor = preferences.edit();
            editor.putBoolean("first_time", false);
            editor.apply();
            startActivity(new Intent(this, SettingsActivity.class));
        }
    }

    @Override
    public void onClick(View v) {
        switch (v.getId()) {
            case R.id.button_closed:
                finish();
                break;

            case R.id.button_login:
                // Instantiate the RequestQueue.
                RequestQueue queue = Volley.newRequestQueue(this);
                String url = preferences.getString("server_url", "http://example.com") + Constants.loginPath;

                // Request a string response from the provided URL.
                StringRequest stringRequest = new StringRequest(Request.Method.POST, url,
                        new Response.Listener<String>() {
                            @Override
                            public void onResponse(String response) {
                                Log.i("VolleyResponse", response);
                                try {
                                    JSONObject object = new JSONObject(response);
                                    if (object.getBoolean("error"))
                                        alert.setText(object.getString("err_desc"));
                                    else {
                                        user = new User(object.getInt("id"), object.getString("name"), object.getBoolean("enabled"), object.getInt("user_type") == 1);
                                        if (user.isEnabled()) {
                                            Intent intent = new Intent(getApplicationContext(), MainActivity.class);
                                            startActivity(intent);
                                        } else
                                            alert.setText(String.format(getString(R.string.no_enabled_user), user.getName()));
                                    }
                                } catch (JSONException e) {
                                    e.printStackTrace();
                                    alert.setText(String.format(getString(R.string.found_error), e.getMessage()));
                                }
                            }
                        }, new Response.ErrorListener() {

                    @Override
                    public void onErrorResponse(VolleyError error) {
                        alert.setText(String.format(getString(R.string.found_error), error.toString() + " - StatusCode: " + error.networkResponse.statusCode));
                    }
                }) {
                    @Override
                    protected Map<String, String> getParams() {
                        Map<String, String> params = new HashMap<>();
                        params.put("pin", pinInput.getText().toString());
                        params.put("isAdmin", "false");

                        return params;
                    }

                    @Override
                    public Map<String, String> getHeaders() {
                        HashMap<String, String> headers = new HashMap<>();
                        headers.put("Content-Type", "application/x-www-form-urlencoded");
                        return headers;
                    }
                };

                // Add the request to the RequestQueue.
                queue.add(stringRequest);
                break;
        }
    }
}
