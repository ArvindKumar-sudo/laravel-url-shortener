<h2>Admin Dashboard</h2>

<form method="POST" action="{{ route('urls.store') }}">
    @csrf
    <input type="text" name="url" placeholder="Enter URL">
    <button type="submit">Generate</button>
</form>

<a href="{{ route('urls.index') }}">View URLs</a>

<a href="{{ route('invite.create') }}">Invite Member</a>
