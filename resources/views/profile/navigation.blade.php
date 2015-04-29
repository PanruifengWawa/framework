<ul class="nav nav-pills nav-stacked">
    <li role="presentation" @if ($active==='basic-setting') class="active" @endif>
        <a href="/profile">基本设置</a>
    </li>
    <li role="presentation" @if ($active==='security-setting') class="active" @endif>
        <a href="/profile/security">安全设置</a>
    </li>
</ul>