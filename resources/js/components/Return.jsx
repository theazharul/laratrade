import React, { Component } from "react";
import ReactDOM from "react-dom";
import axios from "axios";
import Swal from "sweetalert2";
import { sum } from "lodash";

class Return extends Component {
    constructor(props) {
        super(props);
        this.state = {
            cart: [],
            products: [],
            customers: [],
            barcode: "",
            search: "",
            customer_id: "",
            discount: 0
        };

    this.loadCart = this.loadCart.bind(this);
    this.handleOnChangeBarcode = this.handleOnChangeBarcode.bind(this);
    this.handleScanBarcode = this.handleScanBarcode.bind(this);
    this.handleChangeQty = this.handleChangeQty.bind(this);
    this.handleOnChangeDiscount = this.handleOnChangeDiscount.bind(this);
    this.handleEmptyCart = this.handleEmptyCart.bind(this);
    this.loadProducts = this.loadProducts.bind(this);
    this.handleChangeSearch = this.handleChangeSearch.bind(this);
    this.handleSeach = this.handleSeach.bind(this);
    this.setCustomerId = this.setCustomerId.bind(this);
    this.handleClickSubmit = this.handleClickSubmit.bind(this);
    };

};