<?php $currentUrl = $_SERVER['PHP_SELF']; ?>
<header>
    <!-- Fixed navbar -->
    <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Fixed navbar</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <ul class="navbar-nav me-auto mb-2 mb-md-0">
                    <?php
                        $isActiveIndex = stripos($currentUrl, 'index') && empty($_GET['action']);
                        $class = $isActiveIndex? 'active' : '';
                    ?>
                    <li class="nav-item">
                        <a class="nav-link <?=$class?>" aria-current="page" href="index.php">Lista Utenti</a>
                    </li>

                    <?php
                        $isActiveIndex = !empty($_GET['action']) && $_GET['action'] === 'insert';
                        $class = $isActiveIndex? 'active' : '';
                    ?>
                    <li class="nav-item">
                        <a class="nav-link <?=$class?>" href="index.php?action=insert">Aggiungi Utente</a>
                    </li>
                </ul>
                <form class="d-flex" id="searchForm" method="GET" action="<?=$page?>">
                    <select name="recordsPerPage" id="recordsPerPage" class="selectpicker form-control" onchange="document.forms.searchForm.submit()">
                        <option value="">Seleziona...</option>
                        <?php foreach($numberOfRecordsOptions as $val): ?>
                            <option value="<?=$val?>" <?=((int)getParam('recordsPerPage') === $val)? 'selected': ''; ?> ><?=$val?></option>
                        <?php endforeach; ?>
                    </select>&nbsp;

                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" id="searchUser" name="searchUser">
                    <button class="btn btn-outline-success" type="submit">Search</button>&nbsp;
                    <button class="btn btn-warning" type="button">Reset</button>
                </form>
            </div>
        </div>
    </nav>
</header>