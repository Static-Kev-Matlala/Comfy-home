<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <!-- links -->
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        .active{
            text-decoration:underline;
            color:black;
            background:gray;
        }
    </style>
</head>
<body>
<div class="sidebar">
        <div class="logo"></div>
        <ul class="menu">
            <li >
                <a href="dashbord.php" >
                    <i class="fas fa-tachometer-alt"></i>
                    <span>Dashboard</span>
                </a>
            </li>

            <li>
                <a href="profile.php">
                    <i class="fas fa-user"></i>
                    <span>Profile</span>
                </a>
            </li>

            <li>
                <a href="admin.php">
                    <i class="fas fa-chart-bar"></i>
                    <span>Admin</span>
                </a>
            </li>

            <li class="active">
                <a href="customers.php">
                    <i class="fas fa-briefcase"></i>
                    <span>Customers</span>
                </a>
            </li>

            <li>
                <a href="products.php">
                    <i class="fas fa-question-circle"></i>
                    <span>Products</span>
                </a>
            </li>

            <!-- <li>
                <a href="#">
                    <i class="fas fa-star"></i>
                    <span></span>
                </a>
            </li>

            <li>
                <a href="#">
                    <i class="fas fa-cog"></i>
                    <span>Settings</span>
                </a>
            </li> -->

            <li class="logout">
                <a href="#">
                    <i class="fas fa-sign-out-alt"></i>
                    <span>Logout</span>
                </a>
            </li>
        </ul>
    </div>

    <div class="main--content">
        <div class="header--wrapper">
            <div class="header--title">
                <span>Primary</span>
                <h2>Dashboard</h2>
            </div>
            <div class="user--info">
                <div class="search--box">
                    <i class="fa-solid fa-search"></i>
                    <input type="text" placeholder="Search">
                </div>
                <img src="./image/image.jpg" alt="">
            </div>
        </div>

        <div class="card--container">
            <h3 class="main--title">Today's data</h3>
            <div class="card-wrapper">
                <div class="payment--card light-red">
                    <div class="card--header">
                        <div class="amount">
                            <span class="title">Payment amount</span>
                            <span class="amount--value">$500.00</span>
                        </div>
                        <i class="fas fa-dollar-sign icon">

                        </i>
                    </div>
                    <span class="card--detail">**** **** **** 3484</span>
                </div>

                <div class="payment--card light-purple">
                    <div class="card--header">
                        <div class="amount">
                            <span class="title">Payment order</span>
                            <span class="amount--value">$20.00</span>
                        </div>
                        <i class="fas fa-list icon dark-purple">

                        </i>
                    </div>
                    <span class="card--detail">**** **** **** 5542</span>
                </div>

                <div class="payment--card light-green">
                    <div class="card--header">
                        <div class="amount">
                            <span class="title">Payment customer</span>
                            <span class="amount--value">$350.00</span>
                        </div>
                        <i class="fas fa-users icon dark-green">

                        </i>
                    </div>
                    <span class="card--detail">**** **** **** 8896</span>
                </div>

                <div class="payment--card light-blue">
                    <div class="card--header">
                        <div class="amount">
                            <span class="title">Payment proceed</span>
                            <span class="amount--value">$150.00</span>
                        </div>
                        <i class="fas fa-check icon dark-blue">

                        </i>
                    </div>
                    <span class="card--detail">**** **** **** 7745</span>
                </div>

            </div>
        </div>

        <div class="tabular--wrapper">
            <h3 class="main--title">Finance data</h3>
            <div class="table-container">





                <table>
                    <thead>
                        <tr>
                            <th>Date</th>
                            <th>Transaction type</th>
                            <th>Description</th>
                            <th>Amount</th>
                            <th>Category</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><?php echo $username?></td>
                                <td>Expenses</td>
                                <td>Office Supplies</td>
                                <td>$250</td>
                                <td>Office Expenses</td>
                                <td>Pending</td>
                                <td><button>Edit</button></td>
                            </tr>

                            <tr>
                                <td>2024-05-30</td>
                                <td>Expenses</td>
                                <td>Office Supplies</td>
                                <td>$250</td>
                                <td>Office Expenses</td>
                                <td>Pending</td>
                                <td><button>Edit</button></td>
                            </tr>

                            <tr>
                                <td>2024-05-30</td>
                                <td>Expenses</td>
                                <td>Office Supplies</td>
                                <td>$250</td>
                                <td>Office Expenses</td>
                                <td>Pending</td>
                                <td><button>Edit</button></td>
                            </tr>

                            <tr>
                                <td>2024-05-30</td>
                                <td>Expenses</td>
                                <td>Office Supplies</td>
                                <td>$250</td>
                                <td>Office Expenses</td>
                                <td>Pending</td>
                                <td><button>Edit</button></td>
                            </tr>
                        </tbody>
                            <tfoot>
                                <tr>
                                    <td colspan="7">Total: $1,000</td>
                                </tr>
                            </tfoot>
                </table>
            </div>
        </div>

    </div>
</body>
</html>