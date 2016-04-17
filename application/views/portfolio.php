<h1>Player Information</h1>
<h2>{name}</h2>

<form accept-charset="utf-8" method="post" action="portfolio">
    <fieldset>
        <legend> </legend>
        Players:
        <select name="player_info" onchange="this.form.submit()"> 
        <?php   
            echo '<option value="recent" selected>Select Player</option>';
            echo '{players}';
            echo '<option value="{player}">{player}</option>';
            echo '{/players}';
        ?>
        </select>
    </fieldset>
</form>

<br/>
<br/>

<div class="ui center aligned two column grid">
    <div class="column">
        <h2>Recent Trading Activity</h2>
        <div class="row">
            <table class="ui celled table">
            <thead>
            <tr>
                <th>Datetime</th>
                <th>Stock</th>
                <th>Transaction</th>
                <th>Quantity</th>
            </tr>
            </thead>
            
            <tbody>
            {transactions}
            <tr>
                <td>{datetime}</td>
                <td>{stock}</td>
                <td>{transaction}</td>
                <td>{quantity}</td>
            </tr>
            {/transactions}
            </tbody>
            </table>
        </div>
    </div>
    
    <div class="column">
        <h2>Current Holdings</h2>
        <div class="row">
            <table class="ui celled table">
            <thead>
            <tr>
                <th>Stock</th>
                <th>Amount</th>
                <th>Buy</th>
                <th>Sell</th>
            </tr>
            </thead>
            
            <tbody>
            {holdings}
            <tr>
                <td>{stock}</td>
                <td>{amount}</td>
                <td><a title="Click to purchase stock" href="#" onclick="BuyStock('{stock}');return false;">Buy</a></td>
                <td><a title="Click to sell stock" href="#" onclick="SellStock('{stock}');return false;">Sell</a></td>
            </tr>
            {/holdings}
            </tbody>
            </table>
        </div>
    </div>
</div>
