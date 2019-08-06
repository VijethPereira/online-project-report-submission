<div class=" header py-1 d-flex" >
                    <div class="container" >
                        <div class="d-flex" >
                            <a style="margin-top: 10px" class="header-brand" href="index.php">
                                <h1>Amrutha Bindu Milk Dairy</h1>
                            </a>
                        
                            <div class="d-flex order-lg-2 ml-auto">
                                <div class="dropdown d-none d-md-flex" >
                                    <a  class="nav-link icon full-screen-link">
                                        <i class="fe fe-maximize floating"  id="fullscreen-button"></i>
                                    </a>
                                </div>
                              
                            
                                <div class="dropdown">
                                    <a href="#" class="nav-link pr-0 leading-none user-img" data-toggle="dropdown">
                                        <span style="color: white;
    font-size: x-large;
    margin-top: 13px;">Admin</span>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow ">
                                        <a class="dropdown-item" href="edit_profile.php">
                                            <i class="dropdown-icon si si-user"></i> Setting
                                        </a>
                                       
                                        <a class="dropdown-item" href="logout.php">
                                            <i class="dropdown-icon si si-power"></i> Log out
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <a href="#" class="header-toggler d-lg-none ml-3 ml-lg-0" data-toggle="collapse" data-target="#headerMenuCollapse">
                                <span class="header-toggler-icon"></span>
                            </a>
                        </div>
                    </div>
                </div>

                <div class="admin-navbar" id="headerMenuCollapse">
                    <div class="container">
                        <ul class="nav">
                            <li class="nav-item ">
                                <a class="nav-link " href="index.php">
                                    <i class="si si-speedometer"></i>
                                    <span>Milk</span>
                                </a>
                                <!-- sub-item -->
                            </li>
                            <li class="nav-item with-sub ">
                                <a class="nav-link " data-toggle="dropdown" href="#"><i class="si si-rocket"></i> <span>Accounts</span></a>
                                <div class="sub-item">
                                    <ul>
                                        <li>
                                            <a href="add_member.php">Add Member</a>
                                        </li>
                                        <li>
                                            <a href="view_member.php">View Member</a>
                                        </li>
                                        <li>
                                            <a href="add_employee.php">Add Employee</a>
                                        </li>
                                        <li>
                                            <a href="view_employee.php">View Employee</a>
                                        </li>

                                        <li>
                                            <a href="add_salary.php">Add Employee Salary</a>
                                        </li>

                                        <li>
                                            <a href="view_salary.php">View Employee Salary</a>
                                        </li>
                                           
                                     
                                    </ul>
                                </div>
                                <!-- dropdown-menu -->
                            </li>
                            <!-- <li class="nav-item">
                                <a class="nav-link"  href="widgets.html"><i class="si si-layers"></i> <span>Widgets</span></a>
                            </li> -->
                          <!--   <li class="nav-item with-sub">
                                <a class="nav-link" href="#"><i class="si si-disc"></i> <span>Employee</span></a>
                                <div class="sub-item">
                                    <ul>
                                        <li>
                                            <a href="add_employee.php">Add Employee</a>
                                        </li>
                                        <li>
                                            <a href="view_employee.php">View Employee</a>
                                        </li>
                                        
                                        
                                    </ul>
                                </div>
                            </li> -->
                              <li class="nav-item with-sub">
                                <a class="nav-link" data-toggle="dropdown" href="#"><i class="si si-docs"></i> <span>Attendence</span></a>
                                <div class="sub-item">
                                    <ul>
                                        <li>
                                            <a href="attendance.php">Attendence</a>
                                        </li>
                                        <li>
                                            <a href="view_attendance.php">View </a>
                                        </li>
                                        
                                    </ul>
                                </div>
                                <!-- dropdown-menu -->
                            </li>

                            <li class="nav-item with-sub">
                                <a class="nav-link" href="#"><i class="si si-chart"></i> <span>FEED</span></a>
                                <div class="sub-item">
                                    <ul>
                                        
                                        <li>
                                            <a href="add_feed.php">Add Feed</a>
                                        </li>

                                        <li>
                                            <a href="add_feed_category.php">Add Feed Category</a>
                                        </li>

                                        <li>
                                            <a href="view_feed.php">View Feed</a>
                                        </li>
                                       
                                        <li>
                                            <a href="view_feed_category.php">View Feed Category</a>
                                        </li>
                                       
                                    </ul>
                                        
                                    
                                
                            </li>
                            <li class="nav-item with-sub">
                                <a class="nav-link" href="#"><i class="si si-organization"></i><span>Sales</span></a>
                                <div class="sub-item">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="row">
                                                <div class="col">
                                                    <ul>
                                                        <li>
                                                            <a href="milk_sale.php">Milk Sales</a>
                                                        </li>
                                                        <li>
                                                            <a href="feed_sale.php">Feed Sales</a>
                                                        </li>
                                                       
                                                        
                                                    </ul>
                                                </div><!-- col -->
                                            </div><!-- row -->
                                        </div><!-- col -->
                                    </div><!-- row -->
                                </div>
                                <!-- dropdown-menu -->
                            </li>
                            <li class="nav-item with-sub">
                                <a class="nav-link" data-toggle="dropdown" href="#"><i class="si si-docs"></i> <span>Stock</span></a>
                                <div class="sub-item">
                                    <ul>
                                        <li>
                                            <a href="feed_stock.php">View Stock</a>
                                        </li>
                                        <li>
                                            <a href="add_feed_stock.php">Add Stock</a>
                                        </li>
                                        
                                    </ul>
                                </div>
                                <!-- dropdown-menu -->
                            </li>
                            <li class="nav-item with-sub">
                                <a class="nav-link " href="#"><i class="si si-diamond"></i><span>Milk</span></a>
                                <div class="sub-item">
                                    <ul>
                                        
                                        <li>
                                            <a href="view_mlk.php">View Milk</a>
                                        </li>
                                        <li>
                                            <a href="milk_sold.php">Milk Sold   </a>
                                        </li>
                                    

                                    </ul>
                                
                                </div>
                                <!-- dropdown-menu -->
                            </li>
                            <li class="nav-item with-sub">
                                <a class="nav-link" data-toggle="dropdown" href="#"><i class="si si-docs"></i> <span>Products</span></a>
                                <div class="sub-item">
                                    <ul>
                                        <li>
                                            <a href="choclate.php">choclates</a>
                                        </li>
                                        <li>
                                            <a href="feed_stock.php">Ice Cream</a>
                                        </li>
                                        <li>
                                            <a href="feed_stock.php">Juice</a>
                                        </li>
                                        <li>
                                            <a href="add_feed_stock.php">Other products</a>
                                        </li>
                                        
                                    </ul>
                                </div>
                                <!-- dropdown-menu -->
                            </li>
                               <li class="nav-item with-sub">
                                <a class="nav-link" data-toggle="dropdown" href="#"><i class="si si-shield"></i> <span>Expenses</span></a>
                                <div class="sub-item">
                                    <ul>
                                    <li>
                                            <a href="add_exp.php">Add Expenses</a>
                                        </li>
                                        <li>
                                            <a href="view_exp.php"> View Expenses</a>
                                        </li>
                                    </ul>
                                </div>

                                <!-- dropdown-menu -->
                            </li>

                            <li class="nav-item with-sub">
                                <a class="nav-link" data-toggle="dropdown" href="#"><i class="si si-shield"></i> <span>Reports</span></a>
                                <div class="sub-item">
                                    
                                  <ul>
                                        <li>
                                            <a href="milk_report.php">View Milk Report</a>
                                        </li>
                                        <li>
                                            <a href="feed_repotrs.php">View Feed Reports</a>
                                        </li>
                                        
                                    </ul>
                                    
                                </div>

                                <!-- dropdown-menu -->
                            </li>
                            
                        </ul>
                    </div>
                </div>