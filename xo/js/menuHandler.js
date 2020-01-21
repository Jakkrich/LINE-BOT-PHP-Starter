const modeSpan = document.querySelector('.mode span');

document.querySelector('.pvp').addEventListener('click', e => {
  document.querySelector('#menu-toggle').checked = !document.querySelector('#menu-toggle').checked;
  reset();
  challengeBot = false;
  modeSpan.textContent = "Player";
});

document.querySelector('.pvcEasy').addEventListener('click', e => {
  document.querySelector('#menu-toggle').checked = !document.querySelector('#menu-toggle').checked;
  reset();
  challengeBot = true;
  difficulty = "easy";
  modeSpan.textContent = "Computer (Easy)";
});

document.querySelector('.pvcHard').addEventListener('click', e => {
  document.querySelector('#menu-toggle').checked = !document.querySelector('#menu-toggle').checked;
  reset();
  challengeBot = true;
  difficulty = "hard";
  modeSpan.textContent = "Computer (Hard)";
});

document.querySelector('.pvcAi').addEventListener('click', e => {
  document.querySelector('#menu-toggle').checked = !document.querySelector('#menu-toggle').checked;
  reset();
  challengeBot = true;
  difficulty = "ai";
  modeSpan.textContent = "Computer (AI)";
});
