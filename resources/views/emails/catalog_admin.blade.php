<h2>New Catalog Request Submitted</h2>
<p><strong>Name:</strong> {{ $data['name'] }}</p>
<p><strong>Email:</strong> {{ $data['email'] }}</p>
<p><strong>Phone:</strong> {{ $data['phone'] }}</p>
<p><strong>Country:</strong> {{ $data['country'] }}</p>
<p><strong>Category:</strong> {{ implode(', ', $data['category'] ?? []) }}</p>
<p><strong>Collection:</strong> {{ implode(', ', $data['collection'] ?? []) }}</p>
<p><strong>Message:</strong><br>{{ $data['comments'] }}</p>
