<div class="row">
  <div class="col-12">
    <div class="form-group">
      <label>Customer</label>
      <select name="customer_id" id="customer_id" class="form-control" required>
        <option value="">- Select customer -</option>
        @foreach($customers as $customer)
        <option value="{{ $customer->id }}" {{ $order->customer_id == $customer->id ?  'selected' : '' }}>{{ $customer->fullname }} ({{ $customer->company }})</option>
        @endforeach
      </select>
    </div>
  </div>
  <div class="col-12">
    <div class="form-group">
      <label>Title</label>
      <input type="text" name="title" class="form-control" value="{{ old('title', $order->title) }}" required>
    </div>
  </div>
  <div class="col-12">
    <div class="form-group">
      <label>Description</label>
      <textarea name="description" class="form-control" rows="6">{{ old('description', $order->description) }}</textarea>
    </div>
  </div>
</div>
<div class="row">
  <div class="col-12 col-md-6 col-xl-4">
    <div class="form-group">
      <label>Cost (€)</label>
      <input type="number" name="cost" min="0" step="0.01" class="form-control" value="{{ old('cost', $order->cost) }}" required>
    </div>
  </div>
</div>