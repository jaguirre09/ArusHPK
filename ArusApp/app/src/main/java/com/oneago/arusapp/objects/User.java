package com.oneago.arusapp.objects;

public class User {
    private int id;
    private String name;
    private boolean enabled;
    private boolean isAdmin;

    public User(int id, String name, boolean enabled, boolean isAdmin) {
        this.id = id;
        this.name = name;
        this.enabled = enabled;
        this.isAdmin = isAdmin;
    }

    public int getId() {
        return id;
    }

    public String getName() {
        return name;
    }

    public boolean isEnabled() {
        return enabled;
    }

    public boolean isAdmin() {
        return isAdmin;
    }
}
