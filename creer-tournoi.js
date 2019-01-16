document.querySelector('input[type=submit]').addEventListener('click', (e) => {
  const nbSelectedParticipants = document.querySelector('select').selectedOptions.length
  if (nbSelectedParticipants !== 16)
  {
    alert(`Vous devez sélectionner 16 personnes (${nbSelectedParticipants} sélectionnée(s) actuellement)`);
    e.preventDefault();
  }
});
