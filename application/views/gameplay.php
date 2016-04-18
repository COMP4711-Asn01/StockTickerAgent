<script type="text/javascript"
    src="http://code.jquery.com/jquery-1.10.1.min.js"></script>
<script>
    $(document).ready(
            function() {
                setInterval(function() {
                    location.reload();
                }, 3000);
            });
</script>
 

<div class="ui center aligned three column grid">
    <div class="column">
        <h2>{name}</h2>
        <div class = "row">
            <img src="./assets/avatar/{avatar}" />
        </div>
        <div class = "row">
            <form class="upload_form" action="upload/upload_it" enctype="multipart/form-data" method="post" accept-charset="utf-8">
                <input type="file" name="avatar" size="20" />
                <input type="submit" value="Upload It" />
            </form>
        </div>
        <div class="row">
            <h4>Cash: {cash}</h4>
            <h4>Equity: {equity}</h4>
            <h3>Status</h3>
            <h4>Round: {round}</h4>
            <h4>State: {state}</h4>
            <h4>Duration: {duration}</h4>
            <h4>Countdown: {countdown}</h4>
        </div>
    </div>
    
    <div class="column">
        <h2>Portfolio</h2>
        <div class="row">
            <table class="ui celled table">
            <thead>
            <tr>
                <th>Stock</th>
                <th>Amount</th>
            </tr>
            </thead>
            
            <tbody>
            {portfolio}
            <tr>
                <td>{stock}</td>
                <td>{amount}</td>
                <td><a title="Click to sell stock" href="#" onclick="SellStock('{stock}');return false;">Sell</a></td>
            </tr>
            {/portfolio}
            </tbody>
            </table>
        </div>
    </div>
    
    <div class="column">
        <h2>Market</h2>
        <div class="row">
            <table class="ui celled table">
            <thead>
            <tr>
                <th>Stock</th>
                <th>Action</th>
            </tr>
            </thead>
            
            <tbody>
            {market}
            <tr>
                <td>{stockitem}</td>
                <td><a title="Click to purchase stock" href="#" onclick="BuyStock('{stock}');return false;">Buy</a></td>
            </tr>
            {/market}
            </tbody>
            </table>
        </div>
    </div>
</div>
