<div class="row justify-content-center">
    <div class="col-lg-8">
        <div class="card shadow border-0">
            <div class="card-body">
                <ul class="progress-indicator m-4">
                    <li
                        class="{{ $uri == 'createidentity' ? 'completed' : '' }} {{ $uri == 'pick' ? 'completed' : '' }} {{ $uri == 'countperson' ? 'completed' : '' }} {{ $uri == 'chooseroom' ? 'completed' : '' }} {{ $uri == 'confirmation' ? 'completed' : '' }} {{ $uri == 'dashboard/order/paydownpayment' ? 'completed' : '' }}">
                        <span class="bubble"></span> Identity Card
                    </li>
                    <li
                        class="{{ $uri == 'countperson' ? 'completed' : '' }} {{ $uri == 'chooseroom' ? 'completed' : '' }} {{ $uri == 'confirmation' ? 'completed' : '' }} {{ $uri == 'dashboard/order/paydownpayment' ? 'completed' : '' }}">
                        <span class="bubble"></span> How many person?
                    </li>
                    <li
                        class="{{ $uri == 'chooseroom' ? 'completed' : '' }} {{ $uri == 'confirmation' ? 'completed' : '' }} {{ $uri == 'dashboard/order/paydownpayment' ? 'completed' : '' }}">
                        <span class="bubble"></span> Pick a room
                    </li>
                    <li
                        class="{{ $uri == 'confirmation' ? 'completed' : '' }} {{ $uri == 'dashboard/order/paydownpayment' ? 'completed' : '' }}">
                        <span class="bubble"></span> Confirmation
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
