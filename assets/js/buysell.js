function BuyStock(stock) {
    var quantity = prompt("How many of "+stock+" would you like to buy?", "1");
    window.location = "/portfolio/buy/" + stock + "/" + quantity;
    return false;
}
function SellStock(stock) {
    var quantity = prompt("How many of "+stock+" would you like to sell?", "1");
    window.location = "/portfolio/sell/" + stock + "/" + quantity;
    return false;
}