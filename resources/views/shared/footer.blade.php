<footer class="footer bg-dark">
    <div class="row p-5 mx-0" style="font-size:0.9rem;">
        <div class="col">
            <legend class="text-light-grey">Site Links</legend>
            <ul class="list-unstyled text-light">
                <li><a href="/about" class="text-dim">About us</a></li>
                <li><a href="/contact" class="text-dim">Contact us</a></li>
                <li><a href="/events" class="text-dim">Recent Events</a></li>
            </ul>
        </div>
        <div class="col">
            <legend class="text-light-grey">Get in touch</legend>
            <address class="address text-dim">
                <p><span class="mdi mdi-my-location"></span> University for Development Studies, Wa Campus</p>
                <p><span class="mdi mdi-call"></span> +233 0208855077</p>
                <p><span class="mdi mdi-email"></span> info@gaspuds.com</p>

            </address>
        </div>
        <div class="col">
            <legend class="text-light-grey">Legal</legend>
            <p class="text-dim">Copyright &copy; {{ now()->year }} {{ config('app.name') }}.com 
                All rights reserved. Content on this website may not be copied, modified and/or 
                transmitted electronically without prior written permission from us.
            </p>
        </div>
    </div>
    <p class="m-0 pb-4 text-center"><span class="mdi mdi-power mr-1 text-warning"></span> 
        Powered by <a href="https://www.bandughana.com" class="text-primary">Bandughana</a> 
        (<a href="tel:+233547420604" class="text-primary">+233547420604</a>)
    </p>
</footer>
