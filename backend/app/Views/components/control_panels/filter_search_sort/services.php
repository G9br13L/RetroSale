<?php
// Component: components/control_panels/filter_search_sort/services.php
// RetroSale Control Panel for Service Management
?>

<form id="servicesFilterForm" onsubmit="return false;"
    class="flex sm:flex-row flex-col sm:items-center gap-3 bg-gray-800/90 shadow-lg backdrop-blur-md mb-6 p-4 border border-gray-700 rounded-xl text-gray-100">

    <!-- 🔍 Search -->
    <div class="flex-1">
        <label for="services_q" class="sr-only">Search by title</label>
        <input
            type="search"
            id="services_q"
            placeholder="Search services by title..."
            class="bg-gray-900/80 shadow-sm px-4 py-2 border border-gray-700 rounded-lg focus:outline-none focus:ring-2 focus:ring-red-500 w-full text-gray-100 transition-all duration-200 placeholder-gray-400" />
    </div>

    <!-- 📊 Sort -->
    <div class="sm:w-48">
        <label for="services_sort" class="sr-only">Sort services</label>
        <select
            id="services_sort"
            class="bg-gray-900/80 shadow-sm px-3 py-2 border border-gray-700 rounded-lg focus:outline-none focus:ring-2 focus:ring-red-500 w-full text-gray-100 transition-all duration-200">
            <option value="">Sort — Default</option>
            <option value="cost_desc">Cost — High → Low</option>
            <option value="cost_asc">Cost — Low → High</option>
            <option value="name_asc">Name A → Z</option>
            <option value="name_desc">Name Z → A</option>
        </select>
    </div>

    <!-- ✅ Availability -->
    <div class="sm:w-48">
        <label for="services_available" class="sr-only">Filter availability</label>
        <select
            id="services_available"
            class="bg-gray-900/80 shadow-sm px-3 py-2 border border-gray-700 rounded-lg focus:outline-none focus:ring-2 focus:ring-red-500 w-full text-gray-100 transition-all duration-200">
            <option value="all">Available — All</option>
            <option value="yes">Yes</option>
            <option value="no">No</option>
        </select>
    </div>

    <!-- 🔁 Reset -->
    <div class="flex justify-end gap-2 sm:ml-auto">
        <button
            type="button"
            id="servicesResetBtn"
            class="inline-flex items-center gap-2 bg-transparent hover:bg-red-600 shadow-md px-4 py-2 border border-red-500 rounded-lg font-medium text-red-400 hover:text-white transition-all duration-200">
            <i class="fa-rotate-left fa-solid"></i> Reset
        </button>
    </div>
</form>

<!-- 🔧 JS Logic -->
<script>
    (function() {
        function waitForTable(maxAttempts = 40, interval = 50) {
            return new Promise(resolve => {
                let attempts = 0;
                const iv = setInterval(() => {
                    const table = document.querySelector('table');
                    attempts++;
                    if (table || attempts >= maxAttempts) {
                        clearInterval(iv);
                        resolve(table);
                    }
                }, interval);
            });
        }

        function initForTable(table) {
            if (!table) return;

            const qInput = document.getElementById('services_q');
            const sortSelect = document.getElementById('services_sort');
            const availSelect = document.getElementById('services_available');
            const resetBtn = document.getElementById('servicesResetBtn');

            const rows = Array.from(table.querySelectorAll('tbody tr'));
            const snapshot = rows.map(row => {
                const cols = Array.from(row.querySelectorAll('td'));
                const title = (cols[0]?.textContent.trim() || '').toLowerCase();
                const costText = (cols[1]?.textContent.trim() || '');
                const cost = parseFloat(costText.replace(/[^0-9.-]+/g, '')) || 0;
                const availableRaw = (cols[2]?.textContent.trim().toLowerCase() || '');
                const available = (/(yes|available|true|1)/i).test(availableRaw) ? 'yes' : 'no';
                return {
                    row,
                    title,
                    cost,
                    available,
                    html: row.outerHTML
                };
            });

            function render(list) {
                const tbody = table.querySelector('tbody');
                if (!list.length) {
                    tbody.innerHTML = '<tr><td class="p-4 text-gray-300 text-center" colspan="8">No services match your search.</td></tr>';
                    return;
                }
                tbody.innerHTML = list.map(i => i.html).join('\n');
            }

            function apply() {
                const q = (qInput.value || '').toLowerCase().trim();
                const sort = sortSelect.value;
                const availFilter = availSelect.value || 'all';

                let out = snapshot.filter(item => {
                    if (q && !item.title.includes(q)) return false;
                    if (availFilter !== 'all' && item.available !== availFilter) return false;
                    return true;
                });

                if (sort === 'cost_desc') out.sort((a, b) => b.cost - a.cost);
                else if (sort === 'cost_asc') out.sort((a, b) => a.cost - b.cost);
                else if (sort === 'name_asc') out.sort((a, b) => a.title.localeCompare(b.title));
                else if (sort === 'name_desc') out.sort((a, b) => b.title.localeCompare(a.title));

                render(out);
            }

            [qInput, sortSelect, availSelect].forEach(el => el?.addEventListener('input', apply));
            resetBtn?.addEventListener('click', () => {
                qInput.value = '';
                sortSelect.value = '';
                availSelect.value = 'all';
                apply();
            });

            apply();
        }

        if (document.readyState === 'complete' || document.readyState === 'interactive') {
            waitForTable().then(initForTable);
        } else {
            document.addEventListener('DOMContentLoaded', () => waitForTable().then(initForTable));
        }
    })();
</script>