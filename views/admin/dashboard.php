<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://unpkg.com/@phosphor-icons/web"></script>
</head>
<body class="bg-gray-100 text-gray-900">
    <div class="flex h-screen">
        <!-- Sidebar -->
        <aside class="w-72 bg-gray-900 text-white p-6 flex flex-col space-y-6 shadow-lg">
            <h1 class="text-3xl font-extrabold text-center flex items-center justify-center">
                <i class="ph ph-chart-bar text-yellow-400 mr-2"></i> Admin Dashboard
            </h1>
            <nav class="flex flex-col space-y-3">
                <a href="#users" class="flex items-center px-5 py-3 rounded-lg bg-gray-800 hover:bg-yellow-400 hover:text-gray-900 transition">
                    <i class="ph ph-users mr-3"></i> Users Management
                </a>
                <a href="#listings" class="flex items-center px-5 py-3 rounded-lg bg-gray-800 hover:bg-yellow-400 hover:text-gray-900 transition">
                    <i class="ph ph-list mr-3"></i> Listings Management
                </a>
                <a href="#transactions" class="flex items-center px-5 py-3 rounded-lg bg-gray-800 hover:bg-yellow-400 hover:text-gray-900 transition">
                    <i class="ph ph-credit-card mr-3"></i> Transactions
                </a>
                <a href="#reviews" class="flex items-center px-5 py-3 rounded-lg bg-gray-800 hover:bg-yellow-400 hover:text-gray-900 transition">
                    <i class="ph ph-star mr-3"></i> Reviews Management
                </a>
                <a href="#stats" class="flex items-center px-5 py-3 rounded-lg bg-gray-800 hover:bg-yellow-400 hover:text-gray-900 transition">
                    <i class="ph ph-chart-line mr-3"></i> Statistics & Reports
                </a>
            </nav>
        </aside>

        <!-- Main Content -->
        <main class="flex-1 p-8 overflow-y-auto">
            <h2 class="text-4xl font-bold mb-6 flex items-center">
                <i class="ph ph-user-circle text-blue-600 mr-3"></i> Welcome, Admin
            </h2>

            <!-- Users Management -->
            <section id="users" class="bg-white shadow-md rounded-lg p-6 border border-gray-200">
                <h3 class="text-2xl font-semibold mb-4 flex items-center">
                    <i class="ph ph-users text-green-600 mr-2"></i> Users Management
                </h3>
                <div class="overflow-x-auto">
                    <table class="w-full border rounded-lg text-left">
                        <thead class="bg-gray-200">
                            <tr>
                                <th class="py-3 px-4">User</th>
                                <th class="py-3 px-4">Email</th>
                                <th class="py-3 px-4">Status</th>
                                <th class="py-3 px-4">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="border-t hover:bg-gray-100">
                                <td class="py-3 px-4">abdelkarim</td>
                                <td class="py-3 px-4">abdelkarim@gmail.com</td>
                                <td class="py-3 px-4 text-green-600 font-bold">Active</td>
                                <td class="py-3 px-4 flex space-x-2">
                                    <button class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded flex items-center transition">
                                        <i class="ph ph-check-circle mr-1"></i> Verify
                                    </button>
                                    <button class="bg-red-600 hover:bg-red-700 text-white px-4 py-2 rounded flex items-center transition">
                                        <i class="ph ph-x-circle mr-1"></i> Suspend
                                    </button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </section>

            <!-- Listings Management -->
<section id="listings" class="bg-white shadow-md rounded-lg p-6 border border-gray-200">
    <h3 class="text-2xl font-semibold mb-4 flex items-center">
        <i class="ph ph-list text-blue-600 mr-2"></i> Listings Management
    </h3>
    <div class="overflow-x-auto">
        <table class="w-full border rounded-lg text-left">
            <thead class="bg-gray-200">
                <tr>
                    <th class="py-3 px-4">Driver</th>
                    <th class="py-3 px-4">Route</th>
                    <th class="py-3 px-4">Date</th>
                    <th class="py-3 px-4">Actions</th>
                </tr>
            </thead>
            <tbody>
                <tr class="border-t hover:bg-gray-100">
                    <td class="py-3 px-4">monsef</td>
                    <td class="py-3 px-4">Casa - Agadir</td>
                    <td class="py-3 px-4">2023-07-15</td>
                    <td class="py-3 px-4 flex space-x-2">
                        <button class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded flex items-center transition">
                            <i class="ph ph-check-circle mr-1"></i> Approve
                        </button>
                        <button class="bg-red-600 hover:bg-red-700 text-white px-4 py-2 rounded flex items-center transition">
                            <i class="ph ph-x-circle mr-1"></i> Remove
                        </button>
                    </td>
                </tr>
                <!-- Add more listing rows here -->
            </tbody>
        </table>
    </div>
</section>

<!-- Transactions -->
<section id="transactions" class="bg-white shadow-md rounded-lg p-6 border border-gray-200 mt-12">
    <h3 class="text-2xl font-semibold mb-4 flex items-center">
        <i class="ph ph-credit-card text-green-600 mr-2"></i> Transactions
    </h3>
    <div class="overflow-x-auto">
        <table class="w-full border rounded-lg text-left">
            <thead class="bg-gray-200">
                <tr>
                    <th class="py-3 px-4">Transaction ID</th>
                    <th class="py-3 px-4">From</th>
                    <th class="py-3 px-4">To</th>
                    <th class="py-3 px-4">Amount</th>
                    <th class="py-3 px-4">Status</th>
                </tr>
            </thead>
            <tbody>
                <tr class="border-t hover:bg-gray-100">
                    <td class="py-3 px-4">TRX-001</td>
                    <td class="py-3 px-4">Monsef</td>
                    <td class="py-3 px-4">Yasser</td>
                    <td class="py-3 px-4">$50.00</td>
                    <td class="py-3 px-4 text-green-600 font-bold">Completed</td>
                </tr>
                <!-- Add more transaction rows here -->
            </tbody>
        </table>
    </div>
</section>

<!-- Reviews Management -->
<section id="reviews" class="bg-white shadow-md rounded-lg p-6 border border-gray-200 mt-12">
    <h3 class="text-2xl font-semibold mb-4 flex items-center">
        <i class="ph ph-star text-yellow-500 mr-2"></i> Reviews Management
    </h3>
    <div class="overflow-x-auto">
        <table class="w-full border rounded-lg text-left">
            <thead class="bg-gray-200">
                <tr>
                    <th class="py-3 px-4">Reviewer</th>
                    <th class="py-3 px-4">Reviewed</th>
                    <th class="py-3 px-4">Rating</th>
                    <th class="py-3 px-4">Comment</th>
                    <th class="py-3 px-4">Actions</th>
                </tr>
            </thead>
            <tbody>
                <tr class="border-t hover:bg-gray-100">
                    <td class="py-3 px-4">amin</td>
                    <td class="py-3 px-4">monsef</td>
                    <td class="py-3 px-4 text-yellow-500 font-bold">4.5</td>
                    <td class="py-3 px-4">Great driver, very punctual!</td>
                    <td class="py-3 px-4">
                        <button class="bg-red-600 hover:bg-red-700 text-white px-4 py-2 rounded flex items-center transition">
                            <i class="ph ph-trash mr-1"></i> Remove
                        </button>
                    </td>
                </tr>
                <!-- Add more review rows here -->
            </tbody>
        </table>
    </div>
</section>

            <!-- Statistics & Reports . -->
            <section id="stats" class="mt-12">
                <h3 class="text-2xl font-semibold mb-4 flex items-center">
                    <i class="ph ph-chart-line text-blue-600 mr-2"></i> Statistics & Reports
                </h3>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-2 gap-6">
                    <div class="bg-white shadow-md rounded-lg p-6 border border-gray-200">
                        <h4 class="text-lg font-semibold mb-4 flex items-center">
                            <i class="ph ph-list text-gray-600 mr-2"></i> Listings Published
                        </h4>
                        <canvas id="listingsChart"></canvas>
                    </div>
                    <div class="bg-white shadow-md rounded-lg p-6 border border-gray-200">
                        <h4 class="text-lg font-semibold mb-4 flex items-center">
                            <i class="ph ph-envelope text-gray-600 mr-2"></i> Requests Sent
                        </h4>
                        <canvas id="requestsChart"></canvas>
                    </div>
                    <div class="bg-white shadow-md rounded-lg p-6 border border-gray-200">
                        <h4 class="text-lg font-semibold mb-4 flex items-center">
                            <i class="ph ph-credit-card text-gray-600 mr-2"></i> Successful Transactions
                        </h4>
                        <canvas id="transactionsChart"></canvas>
                    </div>
                    <div class="bg-white shadow-md rounded-lg p-6 border border-gray-200">
                        <h4 class="text-lg font-semibold mb-4 flex items-center">
                            <i class="ph ph-user-plus text-gray-600 mr-2"></i> User Growth
                        </h4>
                        <canvas id="userGrowthChart"></canvas>
                    </div>
                </div>
            </section>
        </main>
    </div>

    <script>
        // Sample data for charts
        const months = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun'];
        const listingsData = [65, 59, 80, 81, 56, 55];
        const requestsData = [28, 48, 40, 19, 86, 27];
        const transactionsData = [12, 19, 3, 5, 2, 3];
        const userGrowthData = [100, 120, 150, 170, 180, 200];

        function createChart(ctx, label, data, borderColor) {
            new Chart(ctx, {
                type: 'line',
                data: {
                    labels: months,
                    datasets: [{
                        label: label,
                        data: data,
                        borderColor: borderColor,
                        tension: 0.3,
                        fill: false
                    }]
                }
            });
        }
        
        createChart(document.getElementById('listingsChart'), 'Listings Published', listingsData, 'rgb(75, 192, 192)');
        createChart(document.getElementById('requestsChart'), 'Requests Sent', requestsData, 'rgb(153, 102, 255)');
        createChart(document.getElementById('transactionsChart'), 'Successful Transactions', transactionsData, 'rgb(255, 99, 132)');
        createChart(document.getElementById('userGrowthChart'), 'Total Users', userGrowthData, 'rgb(54, 162, 235)');
    </script>
</body>
</html>

