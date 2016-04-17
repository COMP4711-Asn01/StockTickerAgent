<h1>{name}'s Portfolio</h1>

<form accept-charset="utf-8" method="post" action="portfolio">

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
            </tr>
            </thead>
            
            <tbody>
            {holdings}
            <tr>
                <td>{stock}</td>
                <td>{amount}</td>
            </tr>
            {/holdings}
            </tbody>
            </table>
        </div>
    </div>
</div>
