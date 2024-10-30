 <!-- Page header -->
 <div class="page-header page-header-light">
     <div class="page-header-content header-elements-lg-inline">
         <div class="page-title d-flex">
             <h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold">Alpaca</span>
                 - Advanced Inputs</h4>
             <a href="#" class="header-elements-toggle text-body d-lg-none"><i class="icon-more"></i></a>
         </div>

         <div class="header-elements d-none">
             <div class="d-flex justify-content-center">
                 <a href="#" class="btn btn-link btn-float font-size-sm font-weight-semibold text-body">
                     <i class="icon-bars-alt text-pink"></i>
                     <span>Statistics</span>
                 </a>
                 <a href="#" class="btn btn-link btn-float font-size-sm font-weight-semibold text-body">
                     <i class="icon-calculator text-pink"></i>
                     <span>Invoices</span>
                 </a>
                 <a href="#" class="btn btn-link btn-float font-size-sm font-weight-semibold text-body">
                     <i class="icon-calendar5 text-pink"></i>
                     <span>Schedule</span>
                 </a>
             </div>
         </div>
     </div>

     <div class="breadcrumb-line breadcrumb-line-light header-elements-lg-inline">
         <div class="d-flex">
             <div class="breadcrumb">
                 <a href="index.html" class="breadcrumb-item"><i class="icon-home2 mr-2"></i>
                     Home</a>
                 <a href="alpaca_advanced.html" class="breadcrumb-item">Alpaca</a>
                 <span class="breadcrumb-item active">Advanced inputs</span>
             </div>

             <a href="#" class="header-elements-toggle text-body d-lg-none"><i class="icon-more"></i></a>
         </div>

         <div class="header-elements d-none">
             <div class="breadcrumb justify-content-center">
                 <a href="#" class="breadcrumb-elements-item">
                     <i class="icon-comment-discussion mr-2"></i>
                     Support
                 </a>

                 <div class="breadcrumb-elements-item dropdown p-0">
                     <a href="#" class="breadcrumb-elements-item dropdown-toggle" data-toggle="dropdown">
                         <i class="icon-gear mr-2"></i>
                         Settings
                     </a>

                     <div class="dropdown-menu dropdown-menu-right">
                         <a href="#" class="dropdown-item"><i class="icon-user-lock"></i>
                             Account security</a>
                         <a href="#" class="dropdown-item"><i class="icon-statistics"></i>
                             Analytics</a>
                         <a href="#" class="dropdown-item"><i class="icon-accessibility"></i>
                             Accessibility</a>
                         <div class="dropdown-divider"></div>
                         <a href="#" class="dropdown-item"><i class="icon-gear"></i> All
                             settings</a>
                     </div>
                 </div>
             </div>
         </div>
     </div>
 </div>
 <!-- /page header -->


 <!-- Content area -->
 <div class="content">

     <!-- Basic tables title -->
     <div class="mb-3">
         <h6 class="mb-0 font-weight-semibold">
             Basic tables
         </h6>
         <span class="text-muted d-block">Tables with default <code>Bootstrap</code> styling</span>
     </div>
     <!-- /basic tables title -->


     <!-- Basic table -->
     <div class="card">
         <div class="card-header">
             <h5 class="card-title">Basic table</h5>
         </div>

         <div class="card-body">
             Example of a <code>basic</code> table. For basic styling (light padding and only horizontal dividers) add
             the base class <code>.table</code> to any <code>&lt;table&gt;</code>. It may seem super redundant, but
             given the widespread use of tables for other plugins like calendars and date pickers, we've opted to
             isolate our custom table styles.
         </div>

         <div class="table-responsive">
             <table class="table">
                 <thead>
                     <tr>
                         <th>#</th>
                         <th>First Name</th>
                         <th>Last Name</th>
                         <th>Username</th>
                     </tr>
                 </thead>
                 <tbody>
                     <tr>
                         <td>1</td>
                         <td>Eugene</td>
                         <td>Kopyov</td>
                         <td>@Kopyov</td>
                     </tr>
                     <tr>
                         <td>2</td>
                         <td>Victoria</td>
                         <td>Baker</td>
                         <td>@Vicky</td>
                     </tr>
                     <tr>
                         <td>3</td>
                         <td>James</td>
                         <td>Alexander</td>
                         <td>@Alex</td>
                     </tr>
                     <tr>
                         <td>4</td>
                         <td>Franklin</td>
                         <td>Morrison</td>
                         <td>@Frank</td>
                     </tr>
                 </tbody>
             </table>
         </div>
     </div>
     <!-- /basic table -->


     <!-- Striped rows -->
     <div class="card">
         <div class="card-header">
             <h5 class="card-title">Striped rows</h5>
         </div>

         <div class="card-body">
             Example of a table with <code>striped</code> rows. Use <code>.table-striped</code> added to the base
             <code>.table</code> class to add zebra-striping to any table odd row within the <code>&lt;tbody&gt;</code>.
             This styling doesn't work in IE8 and lower as <code>:nth-child</code> CSS selector isn't supported in these
             browser versions. Striped table can be combined with other table styles.
         </div>

         <div class="table-responsive">
             <table class="table table-striped">
                 <thead>
                     <tr>
                         <th>#</th>
                         <th>First Name</th>
                         <th>Last Name</th>
                         <th>Username</th>
                     </tr>
                 </thead>
                 <tbody>
                     <tr>
                         <td>1</td>
                         <td>Eugene</td>
                         <td>Kopyov</td>
                         <td>@Kopyov</td>
                     </tr>
                     <tr>
                         <td>2</td>
                         <td>Victoria</td>
                         <td>Baker</td>
                         <td>@Vicky</td>
                     </tr>
                     <tr>
                         <td>3</td>
                         <td>James</td>
                         <td>Alexander</td>
                         <td>@Alex</td>
                     </tr>
                     <tr>
                         <td>4</td>
                         <td>Franklin</td>
                         <td>Morrison</td>
                         <td>@Frank</td>
                     </tr>
                 </tbody>
             </table>
         </div>
     </div>
     <!-- /striped rows -->


     <!-- Bordered table -->
     <div class="card">
         <div class="card-header">
             <h5 class="card-title">Bordered table</h5>
         </div>

         <div class="card-body">
             Example of a table with fully <code>bordered</code> cells. Add <code>.table-bordered</code> to the base
             <code>.table</code> class for borders on all sides of the table and cells. This is a default Bootstrap
             option for the table, for more advanced border options check <a href="table_borders.html">Table borders</a>
             page. Bordered table can be combined with other table styles.
         </div>

         <div class="table-responsive">
             <table class="table table-bordered">
                 <thead>
                     <tr>
                         <th>#</th>
                         <th>First Name</th>
                         <th>Last Name</th>
                         <th>Username</th>
                     </tr>
                 </thead>
                 <tbody>
                     <tr>
                         <td>1</td>
                         <td>Eugene</td>
                         <td>Kopyov</td>
                         <td>@Kopyov</td>
                     </tr>
                     <tr>
                         <td>2</td>
                         <td>Victoria</td>
                         <td>Baker</td>
                         <td>@Vicky</td>
                     </tr>
                     <tr>
                         <td>3</td>
                         <td>James</td>
                         <td>Alexander</td>
                         <td>@Alex</td>
                     </tr>
                     <tr>
                         <td>4</td>
                         <td>Franklin</td>
                         <td>Morrison</td>
                         <td>@Frank</td>
                     </tr>
                 </tbody>
             </table>
         </div>
     </div>
     <!-- /bordered table -->


     <!-- Bordered striped table -->
     <div class="card">
         <div class="card-header">
             <h5 class="card-title">Bordered striped</h5>
         </div>

         <div class="card-body">
             Example of a <code>bordered</code> table with <code>stiped</code> rows. Add <code>.table-bordered</code>
             and <code>.table-striped</code> classes to the base <code>.table</code> class for borders and row striping.
             This method works with all table border options.
         </div>

         <div class="table-responsive">
             <table class="table table-bordered table-striped">
                 <thead>
                     <tr>
                         <th>#</th>
                         <th>First Name</th>
                         <th>Last Name</th>
                         <th>Username</th>
                     </tr>
                 </thead>
                 <tbody>
                     <tr>
                         <td>1</td>
                         <td>Eugene</td>
                         <td>Kopyov</td>
                         <td>@Kopyov</td>
                     </tr>
                     <tr>
                         <td>2</td>
                         <td>Victoria</td>
                         <td>Baker</td>
                         <td>@Vicky</td>
                     </tr>
                     <tr>
                         <td>3</td>
                         <td>James</td>
                         <td>Alexander</td>
                         <td>@Alex</td>
                     </tr>
                     <tr>
                         <td>4</td>
                         <td>Franklin</td>
                         <td>Morrison</td>
                         <td>@Frank</td>
                     </tr>
                 </tbody>
             </table>
         </div>
     </div>
     <!-- /bordered striped table -->


     <!-- Hover rows -->
     <div class="card">
         <div class="card-header">
             <h5 class="card-title">Hover rows</h5>
         </div>

         <div class="card-body">
             Example of a table with <code>hover</code> rows state. Add <code>.table-hover</code> to enable a hover
             state on table rows within a <code>&lt;tbody&gt;</code>.
         </div>

         <div class="table-responsive">
             <table class="table table-hover">
                 <thead>
                     <tr>
                         <th>#</th>
                         <th>First Name</th>
                         <th>Last Name</th>
                         <th>Username</th>
                     </tr>
                 </thead>
                 <tbody>
                     <tr>
                         <td>1</td>
                         <td>Eugene</td>
                         <td>Kopyov</td>
                         <td>@Kopyov</td>
                     </tr>
                     <tr>
                         <td>2</td>
                         <td>Victoria</td>
                         <td>Baker</td>
                         <td>@Vicky</td>
                     </tr>
                     <tr>
                         <td>3</td>
                         <td>James</td>
                         <td>Alexander</td>
                         <td>@Alex</td>
                     </tr>
                     <tr>
                         <td>4</td>
                         <td>Franklin</td>
                         <td>Morrison</td>
                         <td>@Frank</td>
                     </tr>
                 </tbody>
             </table>
         </div>
     </div>
     <!-- /hover rows -->


     <!-- Scrollable table -->
     <div class="card">
         <div class="card-header">
             <h5 class="card-title">Scrollable table</h5>
         </div>

         <div class="card-body">
             Example of a <code>scrollable</code> table. To use a fixed height with scrolling, wrap any table in a div
             with <code>.table-scrollable</code> class. Max height of the table container will be <code>22.5rem</code>
             and table will get a vertical scrollbar if its height exceeds this value.
         </div>

         <div class="table-responsive table-scrollable">
             <table class="table">
                 <thead>
                     <tr>
                         <th>#</th>
                         <th>First Name</th>
                         <th>Last Name</th>
                         <th>Username</th>
                     </tr>
                 </thead>
                 <tbody>
                     <tr>
                         <td>1</td>
                         <td>Eugene</td>
                         <td>Kopyov</td>
                         <td>@Kopyov</td>
                     </tr>
                     <tr>
                         <td>2</td>
                         <td>Victoria</td>
                         <td>Baker</td>
                         <td>@Vicky</td>
                     </tr>
                     <tr>
                         <td>3</td>
                         <td>James</td>
                         <td>Alexander</td>
                         <td>@Alex</td>
                     </tr>
                     <tr>
                         <td>4</td>
                         <td>Stanley</td>
                         <td>Martins</td>
                         <td>@Stan</td>
                     </tr>
                     <tr>
                         <td>5</td>
                         <td>Winnie</td>
                         <td>the Pooh</td>
                         <td>@Winnie</td>
                     </tr>
                     <tr>
                         <td>6</td>
                         <td>Garry</td>
                         <td>Smith</td>
                         <td>@Garry</td>
                     </tr>
                     <tr>
                         <td>7</td>
                         <td>Ian</td>
                         <td>Berg</td>
                         <td>@Ian</td>
                     </tr>
                     <tr>
                         <td>8</td>
                         <td>John</td>
                         <td>Ryan</td>
                         <td>@John</td>
                     </tr>
                     <tr>
                         <td>9</td>
                         <td>Frank</td>
                         <td>Giggs</td>
                         <td>@Frank</td>
                     </tr>
                     <tr>
                         <td>10</td>
                         <td>Jack</td>
                         <td>Gram</td>
                         <td>@Jack</td>
                     </tr>
                     <tr>
                         <td>11</td>
                         <td>Patrick</td>
                         <td>Lawrence</td>
                         <td>@Patrick</td>
                     </tr>
                     <tr>
                         <td>12</td>
                         <td>Lucy</td>
                         <td>Gulf</td>
                         <td>@Lucy</td>
                     </tr>
                     <tr>
                         <td>13</td>
                         <td>Dave</td>
                         <td>Armstrong</td>
                         <td>@Dave</td>
                     </tr>
                     <tr>
                         <td>14</td>
                         <td>Sean</td>
                         <td>Lewis</td>
                         <td>@Sean</td>
                     </tr>
                 </tbody>
             </table>
         </div>
     </div>
     <!-- /scrollable table -->



     <!-- Card body tables title -->
     <div class="mb-3 pt-2">
         <h6 class="mb-0 font-weight-semibold">
             Card body tables
         </h6>
         <span class="text-muted d-block">Tables placed inside <code>card body</code>.</span>
     </div>
     <!-- /card body tables title -->


     <!-- Card body table -->
     <div class="card">
         <div class="card-header">
             <h5 class="card-title">Card body table</h5>
         </div>

         <div class="card-body">
             <p class="mb-3">Example of a table placed inside <code>card body</code>. Such tables always have
                 additional whitespace taken from <code>.card-body</code> element padding.</p>

             <div class="table-responsive">
                 <table class="table">
                     <thead>
                         <tr>
                             <th>#</th>
                             <th>First Name</th>
                             <th>Last Name</th>
                             <th>Username</th>
                         </tr>
                     </thead>
                     <tbody>
                         <tr>
                             <td>1</td>
                             <td>Eugene</td>
                             <td>Kopyov</td>
                             <td>@Kopyov</td>
                         </tr>
                         <tr>
                             <td>2</td>
                             <td>Victoria</td>
                             <td>Baker</td>
                             <td>@Vicky</td>
                         </tr>
                         <tr>
                             <td>3</td>
                             <td>James</td>
                             <td>Alexander</td>
                             <td>@Alex</td>
                         </tr>
                         <tr>
                             <td>4</td>
                             <td>Franklin</td>
                             <td>Morrison</td>
                             <td>@Frank</td>
                         </tr>
                     </tbody>
                 </table>
             </div>
         </div>
     </div>
     <!-- /card body table -->


     <!-- Framed card body table -->
     <div class="card">
         <div class="card-header">
             <h5 class="card-title">Framed table</h5>
         </div>

         <div class="card-body">
             <p class="mb-3">Example of <code>framed</code> table inside card body. Tables that placed inside card
                 body don't have border around them by default, <code>.table-framed</code> class adds border around the
                 table.</p>

             <div class="card card-table table-responsive shadow-none mb-0">
                 <table class="table">
                     <thead>
                         <tr>
                             <th>#</th>
                             <th>First Name</th>
                             <th>Last Name</th>
                             <th>Username</th>
                         </tr>
                     </thead>
                     <tbody>
                         <tr>
                             <td>1</td>
                             <td>Eugene</td>
                             <td>Kopyov</td>
                             <td>@Kopyov</td>
                         </tr>
                         <tr>
                             <td>2</td>
                             <td>Victoria</td>
                             <td>Baker</td>
                             <td>@Vicky</td>
                         </tr>
                         <tr>
                             <td>3</td>
                             <td>James</td>
                             <td>Alexander</td>
                             <td>@Alex</td>
                         </tr>
                         <tr>
                             <td>4</td>
                             <td>Franklin</td>
                             <td>Morrison</td>
                             <td>@Frank</td>
                         </tr>
                     </tbody>
                 </table>
             </div>
         </div>
     </div>
     <!-- /framed card body table -->


     <!-- Bordered card body table -->
     <div class="card">
         <div class="card-header">
             <h5 class="card-title">Framed bordered</h5>
         </div>

         <div class="card-body">
             <p class="mb-3">Example of <code>bordered framed</code> table inside card body. By default bordered
                 table also doesn't have a border, to use border around the bordered table add
                 <code>.table-framed</code> to the <code>&lt;table></code>.</p>

             <div class="card card-table table-responsive shadow-none mb-0">
                 <table class="table table-bordered">
                     <thead>
                         <tr>
                             <th>#</th>
                             <th>First Name</th>
                             <th>Last Name</th>
                             <th>Username</th>
                         </tr>
                     </thead>
                     <tbody>
                         <tr>
                             <td>1</td>
                             <td>Eugene</td>
                             <td>Kopyov</td>
                             <td>@Kopyov</td>
                         </tr>
                         <tr>
                             <td>2</td>
                             <td>Victoria</td>
                             <td>Baker</td>
                             <td>@Vicky</td>
                         </tr>
                         <tr>
                             <td>3</td>
                             <td>James</td>
                             <td>Alexander</td>
                             <td>@Alex</td>
                         </tr>
                         <tr>
                             <td>4</td>
                             <td>Franklin</td>
                             <td>Morrison</td>
                             <td>@Frank</td>
                         </tr>
                     </tbody>
                 </table>
             </div>
         </div>
     </div>
     <!-- /bordered card body table -->

 </div>
 <!-- /content area -->
