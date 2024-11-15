USE db_teste_leon;

INSERT INTO members (cpf, name, email, filiation_date) VALUES
('12345678901', 'João Ricão', 'joao.ricao@email.com', '2020-01-01'),
('23456789012', 'Anísio Liso', 'anisio.liso@email.com', '2020-01-01');

INSERT INTO members (cpf, name, email) VALUES
('34567890123', 'Janotti Calote', 'janotti.calote@email.com');

INSERT INTO annuities (year, value) VALUES
(2020, 100.00),
(2021, 100.00),
(2024, 120.00);

INSERT INTO checkouts (is_paid, annuity_year, member_cpf) VALUES
(TRUE, 2020, '12345678901'),
(TRUE, 2021, '12345678901'),
(TRUE, 2024, '12345678901'),
(TRUE, 2020, '23456789012'),
(FALSE, 2021, '23456789012'),
(FALSE, 2024, '23456789012'),
(FALSE, 2024, '34567890123');
