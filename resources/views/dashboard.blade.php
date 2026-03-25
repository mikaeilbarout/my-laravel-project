@extends('app')

@section('main')

<style>
.dashboard-container {
    max-width: 650px;
    margin: 40px auto;
    padding: 25px;
    font-family: Arial, sans-serif;
}

.dashboard-title {
    text-align: center;
    color: #2c3e50;
    margin-bottom: 20px;
}

.card {
    background: #ffffff;
    padding: 20px;
    border-radius: 12px;
    border: 1px solid #e0e0e0;
    box-shadow: 0 6px 12px rgba(0,0,0,0.06);
}

/* ✨ each p becomes a nice box */
.info-box {
    background: #f8fafc;
    border: 1px solid #e5e7eb;
    border-left: 5px solid #410739;
    padding: 12px 15px;
    border-radius: 8px;
    margin-bottom: 10px;
    transition: all 0.2s ease;
}

.info-box:hover {
    background: #bdbdd1;
    transform: translateY(-2px);
}

/* buttons */
.actions {
    margin-top: 25px;
    display: flex;
    justify-content: center;
    gap: 12px;
    flex-wrap: wrap;
}

.btn {
    padding: 12px 18px;
    border-radius: 6px;
    font-size: 14px;
    font-weight: bold;
    text-decoration: none;
    color: white;
    border: none;
    cursor: pointer;
    transition: all 0.2s ease;
}

.btn-edit { background: #744c0d; }
.btn-home { background: #13446d; }
.btn-logout { background: #631b13; }

.btn:hover {
    opacity: 0.9;
    transform: scale(1.05);
}
</style>

<div class="dashboard-container">

    <h3 class="dashboard-title">🎉 Welcome to Your Dashboard!</h3>

    <div class="card">
        <p class="info-box"><strong>Name:</strong> {{ Auth::user()->name }}</p>
        <p class="info-box"><strong>Email:</strong> {{ Auth::user()->email }}</p>
        <p class="info-box"><strong>Education:</strong> {{ Auth::user()->education ?? 'Not provided' }}</p>
        <p class="info-box"><strong>Bio:</strong> {{ Auth::user()->bio }}</p>
    </div>

    <div class="actions">
        <a href="/edit-cv" class="btn btn-edit">✏️ Edit Resume</a>
        <a href="/" class="btn btn-home">🏠 Home</a>

        <form action="/logout" method="POST">
            @csrf
            <button type="submit" class="btn btn-logout">🚪 Logout</button>
        </form>
    </div>

</div>

@endsection