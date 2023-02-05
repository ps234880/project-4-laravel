// Price per piece (default medium)
var PricePerBase = document.getElementById("PricePer").innerHTML;
var PricePer = document.getElementById("PricePer").innerHTML;
var Size = 1;
var ValueAmount = 1;
var GottenPizzaCosts = JSON.parse(sessionStorage.getItem("Total"));

// gets added pizza's from session
function CreateReceipt() {
    GottenPizzaCosts = JSON.parse(sessionStorage.getItem("Total"))
    document.getElementById("Receipt").innerHTML = GottenPizzaCosts;
    console.log("totaal kost custom pizza = " + GottenPizzaCosts);
}

function AddPizza() {
    PizzaArray = document.getElementById("Total").innerHTML;
    sessionStorage.setItem("Total", JSON.stringify(PizzaArray));
    GottenPizzaCosts = JSON.parse(sessionStorage.getItem("Total"));
    console.log("totaal kost custom pizza = " + GottenPizzaCosts);
}

// calcs price
function GetAmount() {
    ValueAmount = document.getElementById("Amount").value;
    var PricePer = document.getElementById("PricePer").innerHTML;
    document.getElementById("Total").innerHTML = (ValueAmount * PricePer).toFixed(2);
    GetSize();
}

function GetSize(SelectedSize) {
    if (SelectedSize.value == 1) {
        Size = 0.8;
        document.getElementById("PricePer").innerHTML = (PricePer * Size).toFixed(2);
        document.getElementById("Total").innerHTML = (ValueAmount * PricePer * 0.8).toFixed(2);
    }
    else if (SelectedSize.value == 2) {
        Size = 1;
        document.getElementById("PricePer").innerHTML = (PricePer * Size).toFixed(2);
        document.getElementById("Total").innerHTML = (ValueAmount * PricePer * Size).toFixed(2);
    }
    else {
        Size = 1.2;
        document.getElementById("PricePer").innerHTML = (PricePer * Size).toFixed(2);
        document.getElementById("Total").innerHTML = (ValueAmount * PricePer * Size).toFixed(2);
    }
}

