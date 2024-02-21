<div class="hero-area hero-bg">
    <div class="container">
        <div class="row">
            <div class="col-lg-9 offset-lg-2 text-center">
                <div class="hero-text">
                    <div class="hero-text-tablecell">
                        <h1>Rainforest Discovery Centre</h1>
                        <div class="hero-btns">
                            @if (Route::has('login'))

                            @auth

                            <a class="boxed-btn">Buy Ticket</a>
                            <a href="{{ route('purchasedList') }}" class="boxed-btn1" style="margin-left: 10px;">Purchased Ticket List</a>
                            
                            @endauth

                            @endif

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



