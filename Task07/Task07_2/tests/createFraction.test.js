import { createFraction } from '../src/createFraction.js';

describe('createFraction', () => {
  test('getNumer и getDenom нормализуют дробь', () => {
    const frac = new createFraction(6, 9); // 2/3
    expect(frac.getNumer()).toBe(2);
    expect(frac.getDenom()).toBe(3);
  });

  test('add возвращает правильную сумму', () => {
    const a = new createFraction(1, 2);
    const b = new createFraction(1, 3);
    const result = a.add(b); // 5/6
    expect(result.getNumer()).toBe(5);
    expect(result.getDenom()).toBe(6);
    expect(result.toString()).toBe("5/6");
  });

  test('sub возвращает правильную разность', () => {
    const a = new createFraction(3, 4);
    const b = new createFraction(1, 2);
    const result = a.sub(b); // 1/4
    expect(result.getNumer()).toBe(1);
    expect(result.getDenom()).toBe(4);
    expect(result.toString()).toBe("1/4");
  });

  test('знаменатель равен 0 — выбрасывается ошибка', () => {
    expect(() => createFraction(1, 0)).toThrow("Знаменатель не может быть нулевым");
  });

  test('нормализация отрицательных числителей и знаменателей', () => {
    let frac = new createFraction(-4, -6); // должно стать 2/3
    expect(frac.getNumer()).toBe(2);
    expect(frac.getDenom()).toBe(3);

    frac = new createFraction(4, -6); // должно стать -2/3
    expect(frac.getNumer()).toBe(-2);
    expect(frac.getDenom()).toBe(3);
  });

  test('сложение с отрицательными дробями', () => {
    const a = new createFraction(-1, 4);
    const b = new createFraction(1, 2);
    const result = a.add(b); // -1/4 + 1/2 = 1/4
    expect(result.getNumer()).toBe(1);
    expect(result.getDenom()).toBe(4);
    expect(result.toString()).toBe("1/4");
  });

  test('вычитание с отрицательными дробями', () => {
    const a = new createFraction(1, 4);
    const b = new createFraction(-1, 2);
    const result = a.sub(b); // 1/4 - (-1/2) = 3/4
    expect(result.getNumer()).toBe(3);
    expect(result.getDenom()).toBe(4);
    expect(result.toString()).toBe("3/4");
  });

  test('дробь с числителем 0', () => {
    const frac = new createFraction(0, 7);
    expect(frac.getNumer()).toBe(0);
    expect(frac.getDenom()).toBe(1); // после нормализации 0/1
    expect(frac.toString()).toBe("0");
  });

  test('создание дроби из целого числа', () => {
    const frac = new createFraction(6, 1);
    expect(frac.getNumer()).toBe(6);
    expect(frac.getDenom()).toBe(1);
    expect(frac.toString()).toBe("6");
  });

  test('toString для дробей, где числитель меньше знаменателя (правильная дробь)', () => {
    const frac = new createFraction(3, 5);
    expect(frac.toString()).toBe("3/5");
  });

  test('toString для отрицательных правильных дробей', () => {
    const frac = new createFraction(-3, 5);
    expect(frac.toString()).toBe("-3/5");
  });

  test('toString для дробей с нулём в числителе', () => {
    const frac = new createFraction(0, 10);
    expect(frac.toString()).toBe("0");
  });

  test('сложение дроби с самой собой', () => {
    const frac = new createFraction(3, 7);
    const result = frac.add(frac);
    expect(result.getNumer()).toBe(6);
    expect(result.getDenom()).toBe(7);
  });

  test('вычитание дроби самой из себя (результат 0)', () => {
    const frac = new createFraction(3, 7);
    const result = frac.sub(frac);
    expect(result.getNumer()).toBe(0);
    expect(result.getDenom()).toBe(1);
  });
});
