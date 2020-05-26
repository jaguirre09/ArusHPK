package com.oneago.arusapp.activities;

import android.content.SharedPreferences;
import android.os.Bundle;
import android.util.Log;
import android.view.View;
import android.widget.Button;
import android.widget.TextView;
import android.widget.Toast;

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

import org.json.JSONException;
import org.json.JSONObject;

public class ActivitySurvey extends AppCompatActivity implements View.OnClickListener {

    private TextView title, description;
    private Button send;
    private SharedPreferences preferences;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_survey);

        title = findViewById(R.id.title);
        description = findViewById(R.id.description);
        send = findViewById(R.id.send);

        send.setOnClickListener(this);

        preferences = PreferenceManager.getDefaultSharedPreferences(this);
    }

    @Override
    protected void onStart() {
        super.onStart();
        // Instantiate the RequestQueue.
        RequestQueue queue = Volley.newRequestQueue(this);
        String url = preferences.getString("server_url", "http://example.com") + Constants.getSurveyPath;

        // Request a string response from the provided URL.
        StringRequest stringRequest = new StringRequest(Request.Method.GET, url,
                new Response.Listener<String>() {
                    @Override
                    public void onResponse(String response) {
                        Log.i("VolleyResponse", response);
                        try {
                            JSONObject object = new JSONObject(response);
                            title.setText(object.getString("title"));
                            description.setText(object.getString("desc"));
                        } catch (JSONException e) {
                            e.printStackTrace();
                            title.setText(R.string.has_found_error);
                            description.setText(e.getMessage());
                        }
                    }
                }, new Response.ErrorListener() {

            @Override
            public void onErrorResponse(VolleyError error) {
                title.setText(R.string.has_found_error);
                description.setText(String.format(getString(R.string.found_error), error.toString() + " - StatusCode: " + error.networkResponse.statusCode));
            }
        });

        // Add the request to the RequestQueue.
        queue.add(stringRequest);
    }

    @Override
    public void onClick(View v) {
        if (v.getId() != R.id.send) {
            return;
        }
        Toast.makeText(this, "Función en fase de desarrollo", Toast.LENGTH_LONG).show();
    }
}
