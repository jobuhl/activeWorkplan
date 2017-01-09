<footer>
    <ul>
        <li><a id="protection" href="{{ url('/admin/protection') . '/' . $week[0]->format('d-m-Y') }}">Dataprotection</a></li>
        <li><a id="impressum" href="{{ url('/admin/impressum') . '/' . $week[0]->format('d-m-Y') }}">Impressum</a></li>
        <li><a id="contact" href="{{ url('/admin/contact') . '/' . $week[0]->format('d-m-Y') }}">Contact</a></li>
    </ul>
</footer>