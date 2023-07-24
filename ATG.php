<?php
// Sample data (replace this with your actual data)
$subjects = array('St','Nsc', 'python', 'php', 'cc','php lab','St lab');
$teachers = array('Teacher A', 'Teacher B', 'Teacher C', 'Teacher D','Teacher E');
$days = array('Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday');
$timeSlots = array('8:55 AM - 9:55 AM', '9:55 AM - 10:50 AM', '1:10 AM - 12:05 PM','12:05 PM - 1:00 PM','1:50 PM - 2:40 PM','2:40 PM - 3:30 PM','3:30 PM - 4:30 PM');

// Function to generate a random timetable
function generateTimetable($subjects, $teachers, $days, $timeSlots)
{
    $timetable = array();

    foreach ($days as $day) {
        foreach ($timeSlots as $timeSlot) {
            // Randomly select a subject and a teacher for this time slot
            $subject = $subjects[array_rand($subjects)];
            $teacher = $teachers[array_rand($teachers)];

            // Add the subject and teacher to the timetable for this day and time slot
            $timetable[$day][$timeSlot] = array('subject' => $subject, 'teacher' => $teacher);
        }
    }

    return $timetable;
}

// Generate the timetable
$generatedTimetable = generateTimetable($subjects, $teachers, $days, $timeSlots);

// Display the timetable
echo '<table border="1">';
echo '<tr><th>Time Slot</th><th>Monday</th><th>Tuesday</th><th>Wednesday</th><th>Thursday</th><th>Friday</th></tr>';
foreach ($timeSlots as $timeSlot) {
    echo '<tr>';
    echo '<td>' . $timeSlot . '</td>';
    foreach ($days as $day) {
        $entry = isset($generatedTimetable[$day][$timeSlot]) ? $generatedTimetable[$day][$timeSlot] : array('subject' => '', 'teacher' => '');
        echo '<td>' . $entry['subject'] . ' (' . $entry['teacher'] . ')' . '</td>';
    }
    echo '</tr>';
}
echo '</table>';
?>
