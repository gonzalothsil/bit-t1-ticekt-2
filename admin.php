<div id="user-count">Usuarios conectados: 0</div>
<script>const ws = new WebSocket("ws://localhost:8080");

ws.onmessage = function(event) {
    const data = JSON.parse(event.data);
    document.getElementById("user-count").innerText =
        "Usuarios conectados: " + data.active_users;
};
</script>
