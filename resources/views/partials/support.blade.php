<div class="row align-items-center g-lg-5 py-5 ps-lg-5">
    <div class="col-lg-7 text-center text-lg-start">
        <h1 class="display-4 fw-bold lh-1 mb-3" id="wilgersDiv">Consider Supporting Us</h1>
        <p class="col-lg-10 fs-4">
            We would really appreciate any financial support, everyone involved are free volunteers but to have a strong
            financial portfolio helps to install and maintain security measures like enclosures and cameras. It also
            helps to take on any legal disputes like undesired property development and land claims.
            <br><br>
            Here are some recommendations but feel free to help with anything you feel is right:
        </p>
        <ul class="list-group">
            <li class="list-group-item">
                R150 p.a. per individual household
            </li>
            <li class="list-group-item">
                R250 p.a. per complex + R10 per unit
            </li>
            <li class="list-group-item">
                R250 for businesses.
            </li>
        </ul>
        <p class="col-lg-10 fs-4">
            You can donate directly via EFT or use the PayFast form to the right/bottom
        </p>

    </div>
    <div class="col-md-6 mx-auto col-lg-4 pe-lg-5">
        <form class="p-4 p-md-5 border rounded-3 bg-light" method="post"
              action="/start/payfast">
            @csrf
            <div class="form-floating mb-3">
                <input type="number" min="10" class="form-control" id="floatingSupportAmount" name="amount" placeholder="name@example.com"
                       value="{{ old('email') }}">
                <label for="floatingSupportAmount">
                    <i class="fa-solid fa-money-bill"></i>
                    Amount you wish to donate
                </label>
            </div>
            <button class="btn btn-lg btn-outline-secondary mx-auto w-100">
                Pay With:
                <img class="px-5" src="/img/paymentGateways/PayFastLogo.webp" width="100%">
            </button>
{{--            <button class="w-100 btn btn-lg btn-success" type="submit">--}}
{{--                Sign In--}}
{{--                <i class="fa-solid fa-arrow-right ms-2"></i>--}}
{{--            </button>--}}
            <hr class="my-4">
            <small class="text-muted">Thank You In Advance For Any Donations!</small><br>
        </form>
        <small>
            BANK TRANSFER: STANDARD BANK<br>
            Account Name: Die Wilgers Residents Association.<br>
            Account Number : 012190764<br>
            Branch Code : 01-24-45
        </small>
    </div>
</div>
