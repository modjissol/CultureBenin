// Notation étoilée sur les cartes de contenu
// Envoi du commentaire sur chaque carte de contenu
document.querySelectorAll('.comment-form').forEach(function(form) {
	form.addEventListener('submit', function(e) {
		e.preventDefault();
		var contentId = form.getAttribute('data-content-id');
		var textarea = form.querySelector('textarea[name="comment"]');
		var comment = textarea.value.trim();
		if(comment.length === 0) return;
		// Envoi AJAX vers le backend Laravel
		fetch('/contenus/' + contentId + '/comment', {
			method: 'POST',
			headers: {
				'Content-Type': 'application/json',
				'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
			},
			body: JSON.stringify({ comment: comment })
		})
		.then(response => response.json())
		.then(data => {
			// Ajoute le commentaire à la liste
			var commentsList = document.querySelector('.comments-list[data-content-id="' + contentId + '"]');
			var newComment = document.createElement('div');
			newComment.className = 'comment-item';
			newComment.style = 'font-size:0.95em;color:#ccc;margin-bottom:4px;';
			newComment.innerHTML = '<strong>' + (data.user || 'Utilisateur') + ':</strong> ' + data.comment;
			commentsList.appendChild(newComment);
			textarea.value = '';
		});
	});
});
document.querySelectorAll('.rating .star').forEach(function(star) {
	star.addEventListener('click', function() {
		var value = this.getAttribute('data-value');
		var ratingDiv = this.parentElement;
		var contentId = ratingDiv.getAttribute('data-content-id');
		// Met à jour l'affichage des étoiles
		ratingDiv.querySelectorAll('.star').forEach(function(s, i) {
			s.classList.toggle('selected', i < value);
		});
		// Envoi AJAX vers le backend Laravel
		fetch('/contenus/' + contentId + '/rate', {
			method: 'POST',
			headers: {
				'Content-Type': 'application/json',
				'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
			},
			body: JSON.stringify({ note: value })
		})
		.then(response => response.json())
		.then(data => {
			ratingDiv.querySelector('.rating-value').textContent = data.note_moyenne + '/5';
		});
	});
});
import './bootstrap';
