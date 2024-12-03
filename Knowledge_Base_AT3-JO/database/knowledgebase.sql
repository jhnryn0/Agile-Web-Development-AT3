-- Switch to the existing database
USE knowledgebase;

-- Drop the `questions` table if it exists to prevent duplicate errors (optional, for safety during updates)
DROP TABLE IF EXISTS questions;

-- Create the `questions` table
CREATE TABLE questions (
    id INT AUTO_INCREMENT PRIMARY KEY,  -- Unique ID for each question
    title VARCHAR(255) NOT NULL,        -- Title of the question
    description TEXT NOT NULL,          -- Description of the question
    answer TEXT NOT NULL,               -- Detailed answer content
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP, -- Creation timestamp
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP -- Update timestamp
);

-- Insert questions and answers into the `questions` table
INSERT INTO questions (title, description, answer) VALUES
-- Question 1
('Question 1: Organizational Requirements', 
 'A good team leader leads by example. Describe the professional behaviours that you would role model as a leader for your team.', 
 'Methods: Verbal, non-verbal, written communication. Style: Assertive communication, balanced tone and volume.'),

-- Question 2
('Question 2: Team Facilitation Techniques', 
 'Coaching and mentoring are development approaches based on the use of one-to-one conversation to enhance an individual’s skills, knowledge, or work performance. Describe 2 techniques in coaching and mentoring that you will use with your team to support the members.', 
 'Techniques: Maintain etiquette, avoid slang, speak slowly, keep it simple.'),

-- Question 3
('Question 3: Mentoring and Coaching Techniques', 
 '1. What does establishing a team performance plan mean and what are the benefits? 2. How would you handle a potential risk or safety hazard? 3. How would you handle an unethical suggestion nearing a project deadline?', 
 '1. Establish performance plan by setting goals and monitoring progress. 2. Handle risks like COVID by using virtual meetings. 3. Reiterate the code of conduct for unethical suggestions.'),

-- Question 4
('Question 4: Conflict Resolution', 
 'Project success depends on effective communication. Steady communication from leadership can improve morale and engagement. Describe the different methods and styles of communication that you will use with your team.', 
 'Methods: Be clear about expectations, commit to staff development, offer feedback, encourage collaboration, and be consistent.'),

-- Question 5
('Question 5: Communication Methods and Styles', 
 'Personal events can often place strain on teams, and contingencies need to be put in place for unplanned absences, task reallocation, and succession planning. Describe the contingencies you have planned.', 
 'Contingencies: Establish common goals, search for agreements, and commit to resolving issues collaboratively.'),

-- Question 6
('Question 6: Cross-Cultural Communication', 
 'When working with teams from other divisions, describe the organizational policies that you will refer to, to ensure that your project aligns with the organization’s requirements and the importance of each.', 
 'Policies: Workplace policies, code of conduct, culture and reputation, legislative requirements such as EEO and WHS.'),

-- Question 7
('Question 7: Professionalism', 
 'We work and live in a diverse community that has different cultures and individuals with special needs or disabilities. Describe the principles of communication for these groups and how you would apply these principles with your team.', 
 'Principles: Ethics and integrity, building trust, helping others grow, inspiring others, making decisions, rewarding achievements.'),

-- Question 8
('Question 8: Workplace Contingencies', 
 'Cohesive teams are better able to accomplish tasks, solve problems, and create innovation. As a team leader, describe several strategies that you will use to develop team cohesion and effectiveness in your project team.', 
 'Strategies: Code of conduct, corporate social responsibility, equity and diversity policy, and OSH policy.'),

-- Question 9
('Question 9: Teamwork Challenges', 
 'When conflict is resolved effectively, it leads to many benefits, such as accomplishing goals and strengthening relationships. Broadly outline a strategy on how you would resolve a conflict within your team.', 
 'Strategy: Prioritize tasks, evaluate skill sets, allocate tasks effectively, and provide performance management and development.');
