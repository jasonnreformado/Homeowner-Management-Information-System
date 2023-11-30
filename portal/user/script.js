// Sample data for announcements and events
const announcementsData = [
    "Announcement 1",
    "Announcement 2",
    "Announcement 3",
];

const eventsData = [
    "Event 1",
    "Event 2",
    "Event 3",
];

document.getElementById('announcement-btn').addEventListener('click', function() {
    showContainer('announcements-container');
    displayData(announcementsData);
});

document.getElementById('event-btn').addEventListener('click', function() {
    showContainer('events-container');
    displayData(eventsData);
});

function showContainer(containerId) {
    document.getElementById('announcements-container').style.display = 'none';
    document.getElementById('events-container').style.display = 'none';
    document.getElementById(containerId).style.display = 'block';
}

function displayData(data) {
    const container = document.getElementById('announcements-container') || document.getElementById('events-container');
    container.innerHTML = '';
    data.forEach(item => {
        const div = document.createElement('div');
        div.textContent = item;
        container.appendChild(div);
    });
}

// Initial display
showContainer('announcements-container');
displayData(announcementsData);

const faqItems = document.querySelectorAll('.faq');

faqItems.forEach((faq) => {
    const question = faq.querySelector('.question');
    const answer = faq.querySelector('.answer');

    question.addEventListener('click', () => {
        if (answer.style.display === 'none') {
            answer.style.display = 'block';
        } else {
            answer.style.display = 'none';
        }
    });
});
