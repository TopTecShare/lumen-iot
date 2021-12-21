<style>
    ul {
        list-style-type: none;
        margin: 0;
        padding: 0;
        overflow: hidden;
        background-color: #333;
        position: sticky;
        top: 0;
        margin-bottom: 30px;
        width: 100%;
        z-index:9999;
        word-break: normal;
    }

    li {
        float: left;
    }

    li a {
        display: block;
        color: white;
        text-align: center;
        padding: 14px 16px !important;
        text-decoration: none !important;
    }

    li a:hover:not(.active) {
        background-color: #111;
        color: white !important;
    }

    .active {
        background-color: #04aa6d;
        color: white !important;
    }
</style>
<ul>
    @isset($admin) @if($admin)
    <li><a href="/admin" class="admin">Admin</a></li>
    @endisset @endif
    <li><a href="/dashboard" class="dashboard">Dashboard</a></li>
    <li><a href="/sensors" class="sensors">Sensors</a></li>
    <li><a href="/interface" class="interface">Interface</a></li>
</ul>
