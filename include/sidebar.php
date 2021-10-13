<div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <div class="sb-sidenav-menu-heading">Menu</div>
                            <a class="nav-link" href="index.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                 LMS
                            </a>
                            <div class="sb-sidenav-menu-heading">Interface</div>
                            <a class="nav-link collapsed" href="lend_books.php" data-bs-toggle="collapse" data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                                Lend Books
                            </a>
                            <?php echo $_SESSION['lms']['member_type'] == 'Admin' ? ' <a class="nav-link collapsed" href="books.php" data-bs-toggle="collapse" data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                                Add Books
                            </a>
                            <a class="nav-link collapsed" href="members.php" data-bs-toggle="collapse" data-bs-target="#collapsePages" aria-expanded="false" aria-controls="collapsePages">
                                <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                                Add Members
                            </a>
                            <div class="sb-sidenav-menu-heading">Extras</div>
                            <a class="nav-link" href="member_status.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                                Membership status
                            </a>' : ''; ?>  
                            <a class="nav-link" href="borrowed_books.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                                Borrowed Items
                            </a>
                        </div>
                    </div>
                
                    <div class="sb-sidenav-footer">
                        <p> Logged in as : <?php print_r($_SESSION['lms']['name']); ?></p>
                    
                    </div>
                </nav>