<a href="{{ route('employees.show', $row->employee_id) }}" class="text-indigo-500 hover:text-indigo-600 hover:underline">
    {{ $row->first_name }} {{ $row->last_name }}
</a>
