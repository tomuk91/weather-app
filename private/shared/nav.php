<nav class="navbar navbar-light bg-light">
    <div class="container-fluid">
        <a class="navbar-brand">Weather Network</a>
        <h5 id="clock"></h5>
        <form id="form">
            <input type="search" id="query" name="searchCity" placeholder="Enter a city...">
            <button>
                <svg viewBox="0 0 1024 1024">
                    <path class="path1"
                          d="M848.471 928l-263.059-263.059c-48.941 36.706-110.118 55.059-177.412 55.059-171.294 0-312-140.706-312-312s140.706-312 312-312c171.294 0 312 140.706 312 312 0 67.294-24.471 128.471-55.059 177.412l263.059 263.059-79.529 79.529zM189.623 408.078c0 121.364 97.091 218.455 218.455 218.455s218.455-97.091 218.455-218.455c0-121.364-103.159-218.455-218.455-218.455-121.364 0-218.455 97.091-218.455 218.455z"></path>
                </svg>
            </button>
        </form>
    </div>
</nav>

<script defer>
    const now = new Date(<?php echo time() * 1000 ?>);

    function startInterval() {
        setInterval('updateTime();', 1000);
    }

    startInterval();//
    function updateTime() {
        let nowMS = now.getTime();
        nowMS += 1000;
        now.setTime(nowMS);
        const clock = document.getElementById('clock');
        if (clock) {
            clock.innerHTML = now.toString();//adjust to suit
        }
    }
</script>