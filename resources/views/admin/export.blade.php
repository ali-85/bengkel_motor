<table class="table table-bordered">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Order Id</th>
            <th scope="col">Created</th>
            <th scope="col">Customer</th>
            <th scope="col">Serial Number</th>
            <th scope="col">Motocycle type</th>
            <th scope="col">Part</th>
            <th scope="col">Total</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($trx as $row)
        <tr>
            <th scope="row">{{ $loop->iteration }}</th>
            <th scope="row">{{ $row->order_id }}</th>
            <th scope="row">{{ $row->created_at }}</th>
            <td>{{ $row->customer }}</td>
            <td>{{ $row->serial }}</td>
            <td>{{ $row->type }}</td>
            <td>
                <ul class="list-group">
                    @foreach (unserialize($row->part) as $part)
                    <li class="list-group-item"> {{ $part['title'] }}  <b>@rupiah($part->price)</b></li>
                    @endforeach
                </ul>
            </td>
            <td>
                @rupiah(unserialize($row->part)->sum('price'))
            </td>
        </tr>
        @endforeach
    </tbody>
</table>