@if(auth()->check())
    <footer class="footer position-absolute d-flex" style="height: 40px; background-color: #f8f8f8">
        <div class="row g-0 justify-content-between align-items-center h-100 footer-row">
            <div class="col-12 col-sm-auto text-center footer-text">
                <p class="mb-0 mt-2 mt-sm-0 text-body">Application developed & maintained by IT Department of M. M. Ispahani Limited.</p>
            </div>
        </div>
    </footer>

    <style>
        .footer-text{
            font-size: 0.8rem;
        }
    </style>
@endif

