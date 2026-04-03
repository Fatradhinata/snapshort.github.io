const dateSpan = document.querySelectorAll('.date-span');

console.log(dateSpan);
function formatTimeAgo(dateString) {
    const now = moment();
    const date = moment(dateString, 'YYYY-MM-DDTHH:mm');

    const secondsAgo = now.diff(date, 'Seconds');
    if (secondsAgo < 60) {
        return `${secondsAgo}s ago`;
    }

    const minutesAgo = now.diff(date, 'Minutes');
    if (minutesAgo < 60) {
        return `${minutesAgo}m ago`;
    }

    const hoursAgo = now.diff(date, 'Hours');
    if (hoursAgo < 24) {
        return `${hoursAgo}h ago`;
    }

    const daysAgo = now.diff(date, 'Days');
    if (daysAgo < 7) {
        return `${daysAgo}d ago`;
    }

    const weeksAgo = now.diff(date, 'Weeks');
    if (weeksAgo < 4) {
        return `${weeksAgo}w ago`;
    }

    
    return date.format('MMMM DD, YYYY');
}


dateSpan.forEach(span => {
    theDate = span.getAttribute('data-date');
    span.innerHTML = formatTimeAgo(theDate);
    
});
