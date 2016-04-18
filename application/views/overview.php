<div class="ui center aligned four column grid">
 
    <div class="column">
        <h2>Current Stocks</h2>
        <div class="row">
            <form action="stock" method="post">
            <table class="ui celled table">
            <thead>
              <th>Stock</th>
              <th>Value</th>
            </tr></thead>
            <tbody>
                {stocks}
                    <tr>
                        <td>{stock}</td>
                        <td>{value}</td>
                    </tr>
                {/stocks}
            </tbody>
            </table>
            </form>
        </div>
    </div>
    
    <div class="column">
        <h2>Players</h2>
        <div class="row">
            <form action="portfolio" method="post">
            <table class="ui celled table">
            <thead>
              <tr><th>Player</th>
              <th>Equity</th>
            </tr></thead>
            <tbody>
                {players}
                <tr>
                    <td>{player}<img src="{avatar}" height="30" width="30"></td>
                    <td>{equity}</td>
                </tr>                
                {/players}
            </tbody>
            </table>
            </form>
        </div>
    </div>
    
    <div class="column">
        <h2>Recent Movement</h2>
        <div class="row">
            <table class="ui celled table">
            <thead>
            <tr>
                <th>Datetime</th>
                <th>Code</th>
                <th>Action</th>
                <th>Amount</th>
            </tr>
            </thead>
            
            <tbody>
            {movements}
            <tr>
                <td>{datetime}</td>
                <td>{code}</td>
                <td>{action}</td>
                <td>{amount}</td>
            </tr>
            {/movements}
            </tbody>
            </table>
        </div>
    </div>
    
    <div class="column">
        <h2>Recent Transactions</h2>
        <div class="row">
            <table class="ui celled table">
            <thead>
            <tr>
                <th>DateTime</th>
                <th>Player</th>
                <th>Stock</th>
                <th>Transactions</th>
                <th>Quantity</th>
            </tr>
            </thead>
            
            <tbody>
            {transactions}
            <tr>
                <td>{datetime}</td>
                <td>{player}</td>
                <td>{stock}</td>
                <td>{trans}</td>
                <td>{quantity}</td>
            </tr>
            {/transactions}
            </tbody>
            </table>
        </div>
    </div>
</div>