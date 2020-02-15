<ul class="footer-nav">
    @foreach ($items as $menu_item)
        <li class="footer-list">
            <a class="footer-link" href="{{ $menu_item->link() }}">
                {{ $menu_item->title }}
            </a>
        </li>
    @endforeach
</ul>

{{-- <ul class="footer-nav">
    <li class="footer-list"><a class="footer-link" href="#terms">Terms</a></li>
    <li class="footer-list"><a class="footer-link" href="#privacy">Privacy</a></li>
    <li class="footer-list"><a class="footer-link" href="#support">Support</a></li>
    <li class="footer-list"><a class="footer-link" href="#contact">Contact</a></li>
</ul> --}}