package com.oneago.arusapp.activities;

import android.content.DialogInterface;
import android.content.SharedPreferences;
import android.os.Bundle;
import android.util.Log;
import android.view.View;
import android.widget.ArrayAdapter;
import android.widget.AutoCompleteTextView;
import android.widget.Button;
import android.widget.EditText;
import android.widget.ImageButton;

import androidx.appcompat.app.AlertDialog;
import androidx.appcompat.app.AppCompatActivity;
import androidx.preference.PreferenceManager;

import com.android.volley.Request;
import com.android.volley.RequestQueue;
import com.android.volley.Response;
import com.android.volley.VolleyError;
import com.android.volley.toolbox.JsonObjectRequest;
import com.android.volley.toolbox.Volley;
import com.oneago.arusapp.Constants;
import com.oneago.arusapp.R;

import org.json.JSONException;
import org.json.JSONObject;

import java.util.HashMap;
import java.util.Map;

import static com.oneago.arusapp.activities.ActivitySessions.user;

public class ServiceManagement extends AppCompatActivity implements View.OnClickListener {

    private EditText name, phone, location, issue;
    private AutoCompleteTextView printer;
    private Button services;
    private ImageButton close;
    private SharedPreferences preferences;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_management);

        preferences = PreferenceManager.getDefaultSharedPreferences(this);


        name = findViewById(R.id.text_name);
        phone = findViewById(R.id.text_phone);
        location = findViewById(R.id.text_location);
        issue = findViewById(R.id.text_request);
        services = findViewById(R.id.button_services);
        close = findViewById(R.id.button_closed);

        name.setEnabled(false);
        name.setText(user.getName());

        services.setOnClickListener(this);
        close.setOnClickListener(this);

        printer = findViewById(R.id.text_print);
        String[] fruits = {"Impresora1", "Imp2", "Imp3", "Imp4"};
        ArrayAdapter<String> adapter = new ArrayAdapter<>(getApplicationContext(), R.layout.spinner, fruits);
        printer.setOnFocusChangeListener(new View.OnFocusChangeListener() {
            @Override
            public void onFocusChange(View view, boolean hasFocus) {
                if (hasFocus) {
                    printer.showDropDown();
                }
            }
        });
        printer.setAdapter(adapter);
    }

    @Override
    public void onClick(View v) {
        switch (v.getId()) {
            case R.id.button_services:

                if (isEmpty(name)) {
                    name.requestFocus();
                    break;
                }

                if (isEmpty(phone)) {
                    phone.requestFocus();
                    break;
                }

                if (isEmpty(location)) {
                    location.requestFocus();
                    break;
                }

                if (isEmpty(issue)) {
                    issue.requestFocus();
                    break;
                }

                if (isEmpty(printer)) {
                    printer.requestFocus();
                    break;
                }

                // Instantiate the RequestQueue.
                RequestQueue queue = Volley.newRequestQueue(this);
                String url = preferences.getString("server_url", "http://example.com") + Constants.sendEmailPath;

                JSONObject object = new JSONObject();
                try {
                    object.put("name", name.getText().toString());
                    object.put("phone", Long.parseLong(phone.getText().toString()));
                    object.put("location", location.getText().toString());
                    object.put("message", issue.getText().toString());
                    object.put("printer", printer.getText().toString());
                } catch (JSONException e) {
                    e.printStackTrace();
                    showAlert(getString(R.string.has_found_error), e.getMessage(), false);
                    break;
                }

                // Request a string response from the provided URL.
                JsonObjectRequest stringRequest = new JsonObjectRequest(Request.Method.POST, url, object, new Response.Listener<JSONObject>() {
                    @Override
                    public void onResponse(JSONObject response) {
                        Log.i("VolleyResponse", response.toString());
                        try {
                            if (!response.getBoolean("sent")) {
                                showAlert(getString(R.string.has_found_error), response.getString("errdesc"), false);
                            } else {
                                showAlert(getString(R.string.send_ok_title), getString(R.string.sending_ok), true);

                            }
                        } catch (JSONException e) {
                            e.printStackTrace();
                            showAlert(getString(R.string.has_found_error), String.format(getString(R.string.found_error), e.getMessage()), false);
                        }
                    }
                }, new Response.ErrorListener() {

                    @Override
                    public void onErrorResponse(VolleyError error) {
                        showAlert(getString(R.string.has_found_error), String.format(getString(R.string.found_error), error.toString() + " - StatusCode: " + error.networkResponse.statusCode), false);
                    }
                }) {
                    @Override
                    public Map<String, String> getHeaders() {
                        HashMap<String, String> headers = new HashMap<>();
                        headers.put("Content-Type", "application/json");
                        return headers;
                    }
                };

                // Add the request to the RequestQueue.
                queue.add(stringRequest);
                break;

            case R.id.button_closed:
                finish();
        }
    }

    /**
     * Method for show alert
     *
     * @param title         Alert title
     * @param message       Alert message
     * @param closeActivity if transact is ok, close this activity
     */
    private void showAlert(String title, String message, boolean closeActivity) {
        AlertDialog.Builder builder = new AlertDialog.Builder(this);
        builder.setTitle(title);
        builder.setMessage(message);
        if (closeActivity) {
            builder.setPositiveButton(R.string.agree, new DialogInterface.OnClickListener() {
                @Override
                public void onClick(DialogInterface dialog, int which) {
                    finish();
                }
            });
        } else
            builder.setPositiveButton(R.string.agree, null);
        builder.show();
    }

    private boolean isEmpty(EditText e) {
        if (e.getText().toString().trim().length() > 0) {
            return false;
        }
        e.setError(String.format(getString(R.string.obligatory_space), e.getHint().toString()), getResources().getDrawable(R.drawable.ic_remove_circle));
        return true;
    }

    private boolean isEmpty(AutoCompleteTextView e) {
        return e.getText().toString().trim().length() <= 0;
    }
}
