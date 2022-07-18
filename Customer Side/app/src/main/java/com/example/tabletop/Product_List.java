package com.example.tabletop;

public class Product_List {

    private String prName;
    private String prPrice;
    private String prImg;

    public Product_List(String prName, String prPrice, String prImg) {
        this.prName = prName;
        this.prPrice = prPrice;
        this.prImg = prImg;
    }

    public String getPrName() {
        return prName;
    }

    public String getPrPrice() {
        return prPrice;
    }

    public String getPrImg() {
        return prImg;
    }
}