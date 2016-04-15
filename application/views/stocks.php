<h1>Stock History</h1>

<form accept-charset="utf-8" method="post" action="stock">
    <fieldset>
        <legend></legend>
        Stock types:
        <select name="stock_type" onchange="this.form.submit()">
            <?php
            echo '<option value="none"></option>';
            echo '<option value="recent">Recent</option>';
            echo '{stocks}';
            echo '<option value="{code}">{name}</option>';
            echo '{/stocks}';
            ?>
        </select>
    </fieldset>
</form>

<br/>
<br/>

<div class="ui center aligned two column grid">
    <div class="column">
        <h2>Movement</h2>
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
        <h2>Transactions</h2>
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
